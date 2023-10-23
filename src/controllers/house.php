<?php
    function ctrlHouse($request, $response, $container) {
        $response->setTemplate("house.php");
        return $response;
    }