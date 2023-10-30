<?php
    function ctrlHouse($request, $response, $container) {
        $id = $request->get(INPUT_GET, "id");
        $dateEntry = $request->get(INPUT_GET, "date-entry");
        $dateExit = $request->get(INPUT_GET, "date-exit");
        $people = $request->get(INPUT_GET, "people");





        $isAvailable = $container->apartments()->isAvailable($id, $dateEntry, $dateExit, $people);


        if ($isAvailable) {
            $apartament = $container->apartments()->get($id);
            $response->set("dateEntry", $dateEntry);
            $response->set("dateExit", $dateExit);
            $response->set("people", $people);
            $response->set("shortDescription", $apartament["short_description"]);

            $response->setTemplate("house.php");
        } else {
            echo "KK";
        }

        return $response;
    }