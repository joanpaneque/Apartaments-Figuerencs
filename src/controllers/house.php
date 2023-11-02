<?php
    function ctrlHouse($request, $response, $container) {
        $id = $request->get(INPUT_GET, "id");
        $dateEntry = $request->get(INPUT_GET, "date-entry");
        $dateExit = $request->get(INPUT_GET, "date-exit");
        $people = $request->get(INPUT_GET, "people");
        
        if (isDDMMYYYYdate($dateEntry)) {
            $dateEntry = convertDDMMYYYYtoYYYYMMDD($dateEntry);
        };

        if (isDDMMYYYYdate($dateExit)) {
            $dateExit = convertDDMMYYYYtoYYYYMMDD($dateExit);
        };

        $isAvailable = $container->apartments()->isAvailable($id, $dateEntry, $dateExit, $people);

        if ($isAvailable) {
            $apartament = $container->apartments()->get($id);

            $apartmentData = $container->apartments()->get($id);


            $response->set("dateEntry", $dateEntry);
            $response->set("dateExit", $dateExit);
            $response->set("people", $people);
            $response->set("shortDescription", $apartament["short_description"]);
            $response->set("name", $apartament["title"]);
            $response->set("squareMeters", $apartament["square_meters"]);
            $response->set("rooms", $apartament["rooms"]);
            $response->set("postalAddress", $apartament["postal_address"]);
            $response->set("pricePeakSeason", $apartament["price_peak_season"]);
            $response->set("longitude", $apartament["longitude"]);
            $response->set("latitude", $apartament["latitude"]);
            $response->set("entryTime", $apartament["entry_time"]);

            $services = explode(",", $apartament["services"] ?? "");
            $response->set("services", $services);


            $response->set("images", $apartmentData["images"]);
            

            $response->setTemplate("house.php");
        } else {
            echo "KK";
        }

        return $response;
    }