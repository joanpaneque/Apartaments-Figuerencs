<?php

function ctrlIndex($request, $response, $container) {

    $cookiesAccepted = $request->get(INPUT_COOKIE, "cookiesAccepted");


    $cookiesAccepted = isset($cookiesAccepted) ? $cookiesAccepted : false;
    $response->set("cookiesAccepted", $cookiesAccepted);

    $response->setTemplate("index.php");

    return $response;
}