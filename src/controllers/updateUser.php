<?php
    function ctrlUpdateUser ($request, $response, $container) {
        $name = $request->get(INPUT_POST, "name");
        $surname = $request->get(INPUT_POST, "surname");
        $phone = $request->get(INPUT_POST, "phone");
        $email = $request->get(INPUT_POST, "email");
        $card_number = $request->get(INPUT_POST, "card_number");
        $cvc = $request->get(INPUT_POST, "cvc");
        $card_date = $request->get(INPUT_POST, "card_date");

        $container->user()->update($name, $surname, $phone, $email, $card_number, $cvc, $card_date);

        $response->redirect("location: index.php?r=information");

        return $response;
    }