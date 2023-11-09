<?php
    function ctrlPersonalInformation($request, $response, $container) {
        $response->setTemplate("personal-information.php");
    
        $user = $container->user()->getData($container->userid);
        $response->set("user", $user);
    
        return $response;
    }
    