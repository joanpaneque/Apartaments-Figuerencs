<?php

function ctrlIndex($request, $response, $container) {

    echo $container->userid;
    $response->setTemplate("index.php");

    return $response;
}