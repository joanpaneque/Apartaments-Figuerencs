<?php

    function ctrlLogout($request, $response, $container) {
        $response->setSession("userid", null);
        $response->setSession("permissions", null);
        $response->setSession("logged", false);
        $response->redirect("location: index.php");
        return $response;
    }