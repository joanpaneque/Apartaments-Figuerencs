<?php

    function ctrlManager($request, $response, $container) {


        $response->setTemplate("manager.php");
        return $response;
    }