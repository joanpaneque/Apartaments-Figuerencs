<?php
    function ctrlRegister ($request, $response, $container) {
        $response->setTemplate("register.php");
        return $response;
    }