<?php

function ctrlCancel($request, $response, $container) {

    $container->apartments()->cancelReservation($container->userid, $request->get(INPUT_GET, "id"));
    
    
    $response->redirect("location: index.php?=reservation");

    return $response;
}