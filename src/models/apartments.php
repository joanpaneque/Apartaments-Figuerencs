<?php

namespace Daw;

class Apartments {
    private $sql;

    public function __construct($config) {
        $conn = new \Daw\Connection($config);
        $this->sql = $conn->getConnection();
    }

    public function get($date1, $date2, $people) {
        // print_r($date1 . "\n");
        // print_r($date2 . "\n");
        // print_r($people . "\n");
    
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
    
        return json_encode($apartmentsWithImages);
    }
}