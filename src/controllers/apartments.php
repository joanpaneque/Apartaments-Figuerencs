<?php

function ctrlApartments($request, $response, $container) {
    $dateEntry = $request->get(INPUT_POST, "date-entry");
    $dateExit = $request->get(INPUT_POST, "date-exit");
    $people = $request->get(INPUT_POST, "people");

    // Convert DD/MM/YYY to YYYY-MM-DD
    if (!empty($dateEntry)) {
        $dateEntry = implode("-", array_reverse(explode("/", $dateEntry)));
    } else {
        $dateEntry = "1970-01-01";
    }
    
    if (!empty($dateExit)) {
        $dateExit = implode("-", array_reverse(explode("/", $dateExit)));
    } else {
        $dateExit = "1970-01-01";
    }

    if (empty($people)) {
        $people = 0;
    }


    $apartments = $container->apartments()->getAll($dateEntry, $dateExit, $people);

    $response->set("apartments", $apartments);

    $response->setJson();

    // print_r($response);
    return $response;
    
}