<?php
    function ctrlPersonalInformation ($request, $response, $container) {
        include "../src/views/personal-information.php";

        $response->setTemplate("personal-information.php");
    }