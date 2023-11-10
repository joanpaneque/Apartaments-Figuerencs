<?php

    function ctrlAcceptCookies($request, $response, $container) {
        $response->setCookie("cookiesAccepted", true, time() + 60 * 60 * 24 * 365);

        $response->redirect("location: index.php");

        return $response;
    }