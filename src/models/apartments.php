<?php

namespace Daw;

class Apartments {
    private $sql;

    public function __construct($sql) {
        $this->sql = $sql;
    }

    public function get($date1, $date2, $people) {

        $query = "
        SELECT a.*, i.url
        FROM apartments a
        LEFT JOIN images i ON a.code = i.apartment_code
        WHERE a.capacity >= :people
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