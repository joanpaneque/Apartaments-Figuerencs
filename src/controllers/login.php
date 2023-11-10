<?php
    function ctrlLogin ($request, $response, $container) {

        $email = $request->get(INPUT_GET, "email");
        $password = $request->get(INPUT_GET, "password");
        
        $errorMessage = "";

        if (!isset($email) && !isset($password)) {
            $errorMessage = "";
        } else if (isset($email) && !isset($password)) {
            $errorMessage = "";
        } else if (!isset($email) && isset($password)) {
            $errorMessage = "";
        } else {
            $userid = $container->user()->login($email, $password);
            
            if ($userid) {
                $permissions = $container->user()->getPermissions($userid);
                $response->setSession("logged", true);
                $response->setSession("userid", $userid);
                $response->setSession("permissions", $permissions);
                $response->redirect("location: index.php");
            } else {
                $errorMessage = "El email o la contrasenya no són correctes";
            }
        }

        echo $errorMessage;
        $response->set("errorMessage", $errorMessage);       
        $response->setTemplate("login.php");
        return $response;
    }