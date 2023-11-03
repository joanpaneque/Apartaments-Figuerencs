<?php
    function ctrlUpdateUser ($request, $response, $container) {
        $name = $request->get(INPUT_POST, "name");
        $surname = $request->get(INPUT_POST, "surname");
        $phone = $request->get(INPUT_POST, "phone");
        $email = $request->get(INPUT_POST, "email");

        // print_r([
        //     $name,
        //     $surname,
        //     $phone,
        //     $email
        // ]);

        $container->user()->update($name, $surname, $phone, $email);

        $response->redirect("location: index.php?r=information");

        return $response;
    }