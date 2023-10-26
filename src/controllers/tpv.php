<?php
    function ctrlTpv ($request, $response, $container) {
        $response->setTemplate("tpv.php");

        return $response;
    }