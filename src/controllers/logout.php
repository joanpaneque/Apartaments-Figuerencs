<?php

    function ctrlLogout($request, $response, $container) {
        $response->setSession("user", null);
        $response->setSession("logged", false);
        $response->redirect("location: index.php");
        return $response;
    }