<?php


    function ctrlUsers($request, $response, $container) {

        $users = $container->user()->getAll($container->userid);

        $response->set("users", $users);

        print_r(json_encode($users));
        $response->setTemplate("users.php");
        return $response;
    }