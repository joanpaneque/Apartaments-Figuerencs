<?php

    function ctrlManagerApartments($request, $response, $container) {   
        $apartments = $container->apartments()->getAllFromManager($container->userid);

        // $response->setJson() doesn't work properly, so we have to do it manually
        // didn't have the time to tell Dani Prados about this bug because of the deadline :( 
        echo json_encode($apartments);
        die();

        return $response;
    }