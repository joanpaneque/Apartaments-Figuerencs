<?php
    function ctrlReservation ($request, $response, $container) {
        $response->setTemplate("reservation.php");

        return $response;
    }