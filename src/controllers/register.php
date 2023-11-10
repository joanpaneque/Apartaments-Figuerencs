<?php
    function ctrlRegister ($request, $response, $container) {

        $registering = $request->get(INPUT_GET, "dologin");

        $name = $request->get(INPUT_GET, "name");
        $surname = $request->get(INPUT_GET, "surname");
        $phone = $request->get(INPUT_GET, "phone");
        $email = $request->get(INPUT_GET, "email");
        $password = $request->get(INPUT_GET, "password");

        if (!$registering) {
            $response->setTemplate("register.php");
            return $response;
        }

        $errorMessage = "";

        $success = $container->user()->register($name, $surname, $email, $phone, $password);

        if ($success) {
            $response->redirect("location: index.php");
            return $response;
        } else {
            $errorMessage = "No s'ha pogut registrar l'usuari";
            echo $errorMessage;
            $response->setTemplate("register.php");
        }


        return $response;
    }