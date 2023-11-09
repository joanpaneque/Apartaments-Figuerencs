<?php

function ctrlCancel($request, $response, $container) {
    $container->apartments()->cancelReservation($container->userid, $request->get(INPUT_GET, "booking_id"));
    
    $response->redirect("location: index.php?r=reservation");

    return $response;
}