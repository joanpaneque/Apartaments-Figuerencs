<?php
    function ctrlGestor ($request, $response, $container) {
        $response->setTemplate("gestor.php");

        return $response;
    }