<?php

    // Configuration
    include "../src/config.php";

    // Emeset library
    include "../src/Emeset/Container.php";
    include "../src/Emeset/Request.php";
    include "../src/Emeset/Response.php";

    $request = new \Emeset\Request();
    $response = new \Emeset\Response();
    $container = new \Emeset\Container($config);

    // Controllers
    include "../src/controllers/login.php";
    include "../src/controllers/register.php";
    include "../src/controllers/personal-information.php";
    include "../src/controllers/reservation.php";
    include "../src/controllers/index.php";
    include "../src/controllers/json-apartments.php";
    include "../src/controllers/house.php";
    include "../src/controllers/tpv.php";
    include "../src/controllers/gestor.php";

    $r = $_REQUEST["r"] ?? "";

    if ($r == "") {
        ctrlIndex($request, $response, $container);
    } elseif ($r == "json-apartments") {
        ctrlJsonApartments($request, $response, $container);
    } elseif ($r === "login") {
        ctrlLogin($request, $response, $container);
    } elseif ($r === "register") {
        ctrlRegister($request, $response, $container);
    } elseif ($r === "information") {
        ctrlPersonalInformation($request, $response, $container);
    } elseif ($r === "reservation") {
        ctrlReservation($request, $response, $container);
    } elseif ($r === "house") {
        ctrlHouse($request, $response, $container);
    } elseif ($r === "tpv") {
        ctrlTpv($request, $response, $container);
    } elseif ($r === "gestor") {
        ctrlGestor($request, $response, $container);
    } else {
        echo "404";
    } 

    $response->response();