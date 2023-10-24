<?php

function ctrlApartments($request, $response, $container) {
    $dateEntry = $request->get(INPUT_POST, "date-entry");
    $dateExit = $request->get(INPUT_POST, "date-exit");
    $people = $request->get(INPUT_POST, "people");

    $response->set("dateEntry", $dateEntry);
    $response->set("dateExit", $dateExit);
    $response->set("people", $people);

    $apartmentsInstance = $container->apartments();
    $apartments = $apartmentsInstance->get($dateEntry, $dateExit, $people);

    $response->set("apartments", $apartments);

    $response->setTemplate("apartments.php");
    return $response;
    
}