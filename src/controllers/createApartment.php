<?php

    function ctrlCreateApartment($request, $response, $container) {

        $doCreate = $request->get(INPUT_POST, "doCreate");

        if (!$doCreate) {
            $response->setTemplate("createApartment.php");
            return $response;
        }

/*
        +-------------------+---------------+------+-----+---------+----------------+
        | Field             | Type          | Null | Key | Default | Extra          |
        +-------------------+---------------+------+-----+---------+----------------+
        | price_off_season  | decimal(10,2) | YES  |     | NULL    |                |
        | price_peak_season | decimal(10,2) | YES  |     | NULL    |                |
        | rooms             | int(11)       | YES  |     | NULL    |                |
        | square_meters     | decimal(8,2)  | YES  |     | NULL    |                |
        | longitude         | decimal(10,6) | YES  |     | NULL    |                |
        | latitude          | decimal(10,6) | YES  |     | NULL    |                |
        | date1_peak_season | date          | YES  |     | NULL    |                |
        | date2_peak_season | date          | YES  |     | NULL    |                |
        | postal_address    | varchar(255)  | YES  |     | NULL    |                |
        | title             | varchar(255)  | YES  |     | NULL    |                |
        | short_description | text          | YES  |     | NULL    |                |
        | code              | int(11)        | NO   | PRI | NULL    | auto_increment |
        | capacity          | int(11)       | YES  |     | NULL    |                |
        | entry_time        | varchar(6)    | YES  |     | NULL    |                |
        | user_code         | int(11)       | YES  |     | NULL    |                |
        +-------------------+---------------+------+-----+---------+----------------+
*/

        $title = $request->get(INPUT_POST, "title");
        $short_description = $request->get(INPUT_POST, "short_description");
        $postal_address = $request->get(INPUT_POST, "postal_address");
        $longitude = $request->get(INPUT_POST, "longitude");
        $latitude = $request->get(INPUT_POST, "latitude");
        $square_meters = $request->get(INPUT_POST, "square_meters");
        $rooms = $request->get(INPUT_POST, "rooms");
        $capacity = $request->get(INPUT_POST, "capacity");
        $entry_time = $request->get(INPUT_POST, "entry_time");
        $price_off_season = $request->get(INPUT_POST, "price_off_season");
        $price_peak_season = $request->get(INPUT_POST, "price_peak_season");
        // $images = $request->get("FILES", "images");

        $images = $_FILES["images"];

        $urls = [];



        foreach ($images["tmp_name"] as $key => $tmp_name) {
            $image_name = basename($images["name"][$key]);
            $destination = "assets/img/" . $image_name;
        
            if (move_uploaded_file($tmp_name, $destination)) {
                echo "Image $image_name has been uploaded successfully!";
                $urls[] = "/" . $destination;
            } else {
                echo "Error uploading image $image_name";
            }
        }

        $container->apartments()->createApartment($title, $short_description, $postal_address, $longitude, $latitude, $square_meters, $rooms, $capacity, $entry_time, $price_off_season, $price_peak_season, $container->userid, $urls);

        $response->redirect("location: index.php?r=manager");
        // print_r([$title, $short_description, $postal_address, $longitude, $latitude, $square_meters, $rooms, $capacity, $entry_time, $price_off_season, $price_peak_season]);

        return $response;
    }