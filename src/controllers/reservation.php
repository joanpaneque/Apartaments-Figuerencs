<?php
    function ctrlReservation ($request, $response, $container) {
        $response->setTemplate("reservation.php");

        $reservations = $container->apartments()->getAllReservations($container->userid);

        $response->set("reservations", $reservations);

        return $response;
    }