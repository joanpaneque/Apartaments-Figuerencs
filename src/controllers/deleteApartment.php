<?php

    function ctrlDeleteApartment($request, $response, $container) {
        $apartment_id = $request->get(INPUT_GET, "apartment_code");
        $container->apartments()->deleteApartment($apartment_id, $container->userid);
        $response->redirect("location: index.php?r=manager");
        return $response;
    }

