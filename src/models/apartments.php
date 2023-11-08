<?php

namespace Daw;

class Apartments {
    private $sql;

    public function __construct($sql) {
        $this->sql = $sql;
    }

    public function get($id) {
        $query = "
        SELECT a.*, i.url
        FROM apartments a
        LEFT JOIN images i ON a.code = i.apartment_code
        WHERE a.code = :id
        ";

        $stmt = $this->sql->prepare($query);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_GROUP | \PDO::FETCH_ASSOC);
    
        $apartmentsWithImages = [];
        foreach ($result as $apartmentCode => $apartmentData) {
            $apartment = reset($apartmentData);
            $apartment["images"] = array_column($apartmentData, "url");
            $apartmentsWithImages[] = $apartment;
        }

        if (empty($apartmentsWithImages)) {
            return [];
        } else {
            return $apartmentsWithImages[0];
        }
    }

    public function makeReservation($id, $date1, $date2, $userid) {
        $query = "
            INSERT INTO bookings (booking_date, apartment_code, date1, date2, user_code)
            VALUES (NOW(), :id, :date1, :date2, :userid)
        ";
    
        $stmt = $this->sql->prepare($query);
        $stmt->bindValue(":id", $id);
        $stmt->bindValue(":date1", $date1);
        $stmt->bindValue(":date2", $date2);
        $stmt->bindValue(":userid", $userid);
        $stmt->execute();
    
        $bookingId = $this->sql->lastInsertId();

        $query = "SELECT * FROM bookings WHERE code = :bookingId";
        $stmt = $this->sql->prepare($query);
        $stmt->bindValue(":bookingId", $bookingId);
        $stmt->execute();
        $reservation = $stmt->fetchAll(\PDO::FETCH_ASSOC);


        return [
            "reservation" => $reservation[0],
            "apartment" => $this->get($id)
        ];
    }

    public function getAllReservations($userid) {
        $query = "SELECT * FROM bookings WHERE user_code = :userid";
        $stmt = $this->sql->prepare($query);
        $stmt->bindValue(":userid", $userid);
        $stmt->execute();

        $reservations = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        $apartments = [];

        foreach ($reservations as $reservation) {
            $apartments[] = $this->get($reservation["apartment_code"]);
        }

        return [
            "reservations" => $reservations,
            "apartments" => $apartments
        ];

    }

    public function getReservation($userid, $booking_code) {

        $query = "SELECT * FROM bookings WHERE user_code = :userid AND code = :booking_code";
        $stmt = $this->sql->prepare($query);
        $stmt->bindValue(":userid", $userid);
        $stmt->bindValue(":booking_code", $booking_code);
        $stmt->execute();
        $reservation = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        // If the reservation is not found, return false
        if (empty($reservation)) return false;

        return [
            "reservation" => $reservation[0],
            "apartment" => $this->get($reservation[0]["apartment_code"])
        ];
    }

    public function cancelReservation($userid, $booking_code) {
        $query = "UPDATE bookings SET cancelled = 1 WHERE user_code = :userid AND code = :booking_code";
        $stmt = $this->sql->prepare($query);
        $stmt->bindValue(":userid", $userid);
        $stmt->bindValue(":booking_code", $booking_code);
        $stmt->execute();
    }

    public function isAvailable($id, $date1, $date2, $people) {
        if ($people == "undefined" || $people == 0) return false;
        $query = "
            SELECT a.*, i.url
            FROM apartments a
            LEFT JOIN images i ON a.code = i.apartment_code
            WHERE a.code = :id
            AND a.capacity >= :people
            AND a.code NOT IN (
                SELECT apartment_code
                FROM bookings
                WHERE (
                    (date1 BETWEEN :date1 AND :date2)
                    OR (date2 BETWEEN :date1 AND :date2)
                    OR (:date1 BETWEEN date1 AND date2)
                    OR (:date2 BETWEEN date1 AND date2)
                )
                AND cancelled = 0
            )
        ";
    
        $stmt = $this->sql->prepare($query);
        $stmt->bindValue(":id", $id);
        $stmt->bindValue(":people", $people);
        $stmt->bindValue(":date1", $date1);
        $stmt->bindValue(":date2", $date2);
        $stmt->execute();
    
        $result = $stmt->fetchAll(\PDO::FETCH_GROUP | \PDO::FETCH_ASSOC);
    
        if (!empty($result)) {
            return true; // Apartment is available
        } else {
            return false; // Apartment is not available
        }
    }
    
    

    public function getAll($date1, $date2, $people) {


        // print_r([$date1, $date2, $people]);

        // die();

        $query = "
            SELECT a.*, i.url
            FROM apartments a
            LEFT JOIN images i ON a.code = i.apartment_code
            WHERE a.capacity >= :people
            AND a.code NOT IN (
                SELECT b1.apartment_code
                FROM bookings AS b1
                WHERE (
                    (:date1 BETWEEN b1.date1 AND b1.date2)
                    OR (:date2 BETWEEN b1.date1 AND b1.date2)
                    OR (b1.date1 BETWEEN :date1 AND :date2)
                )

            )           
        ";
    
    
    
        $stmt = $this->sql->prepare($query);
        $stmt->bindValue(":people", $people);
        $stmt->bindValue(":date1", $date1);
        $stmt->bindValue(":date2", $date2);
        $stmt->execute();
    
        $result = $stmt->fetchAll(\PDO::FETCH_GROUP | \PDO::FETCH_ASSOC);
    
        $apartmentsWithImages = [];
        foreach ($result as $apartmentCode => $apartmentData) {
            $apartment = reset($apartmentData);
            $apartment["images"] = array_column($apartmentData, "url");
            $apartmentsWithImages[] = $apartment;
        }
    
        return $apartmentsWithImages;
    }
}