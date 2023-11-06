<?php
    function ctrlBooking($request, $response, $container) {

        $apartmentCode = $request->get(INPUT_GET, "apartment-code");
        $dateEntry = $request->get(INPUT_GET, "date-entry");
        $dateExit = $request->get(INPUT_GET, "date-exit");
        $people = $request->get(INPUT_GET, "people");


        $reservation = false;

        $isAvailable = $container->apartments()->isAvailable($apartmentCode, $dateEntry, $dateExit, $people);

        if ($isAvailable) {
            $reservation = $container->apartments()->makeReservation($apartmentCode, $dateEntry, $dateExit, $container->userid);
            $response->set("reservation", $reservation);
        }

        $response->set("reservation", $reservation);


        $response->setTemplate("booking.php");

        return $response;
    }
    