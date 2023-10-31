<?php
    function ctrlHouse($request, $response, $container) {
        $id = $request->get(INPUT_GET, "id");
        $dateEntry = $request->get(INPUT_GET, "date-entry");
        $dateExit = $request->get(INPUT_GET, "date-exit");
        $people = $request->get(INPUT_GET, "people");
    
        $isAvailable = $container->apartments()->isAvailable($id, $dateEntry, $dateExit, $people);
    
        if ($isAvailable) {
            $apartment = $container->apartments()->get($id);

            $apartmentData = $container->apartments()->get($id);
    
            $response->set("dateEntry", $dateEntry);
            $response->set("dateExit", $dateExit);
            $response->set("people", $people);
            $response->set("shortDescription", $apartment["short_description"]);
            $response->set("name", $apartment["title"]);
            $response->set("squareMeters", $apartment["square_meters"]);
            $response->set("rooms", $apartment["rooms"]);
            $response->set("postalAddress", $apartment["postal_address"]);
            $response->set("pricePeakSeason", $apartment["price_peak_season"]);
            $response->set("longitude", $apartment["longitude"]);
            $response->set("latitude", $apartment["latitude"]);
            $response->set("entryTime", $apartment["entry_time"]);
            
            // Convert $services to array so we can use it in the house.php
            $services = explode(",", $apartment["services"]);
            $response->set("services", $services);


            $response->set("images", $apartmentData["images"]);
    
            $response->setTemplate("house.php");
        } else {
            echo "KK";
        }
    
        return $response;
    }
    