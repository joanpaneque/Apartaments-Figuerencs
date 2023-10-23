<?php

function ctrlJsonApartments($request, $response, $container) {
    $response->setTemplate("json-apartments.php");

    return $response;
    
}