<?php
    // Configuration
    include "../src/config.php";

    // Functions
    include "../src/functions/dates.php";

    // Middleware
    include "../src/middleware/middleIsLogged.php";

    // Controllers
    include "../src/controllers/login.php";
    include "../src/controllers/register.php";
    include "../src/controllers/personal-information.php";
    include "../src/controllers/reservation.php";
    include "../src/controllers/index.php";
    include "../src/controllers/apartments.php";
    include "../src/controllers/house.php";
    include "../src/controllers/tpv.php";
    include "../src/controllers/logout.php";
    include "../src/controllers/updateUser.php";

    // Models
    include "../src/models/connection.php";
    include "../src/models/apartments.php"; 
    include "../src/models/users.php";

    // Emeset library
    include "../src/Emeset/Container.php";
    include "../src/Emeset/Request.php";
    include "../src/Emeset/Response.php";

    $request = new \Emeset\Request();
    $response = new \Emeset\Response();
    $container = new \Emeset\Container($config);

    // Global variables
    $response->set("userid", $request->get("SESSION", "user"));
    $response->set("permissions", $request->get("SESSION", "permissions"));
    
    $r = $_REQUEST["r"] ?? "";

    if ($r == "") {
        middleIsLogged($request, $response, $container, "ctrlIndex");
    } else if ($r == "apartments") {
        ctrlApartments($request, $response, $container);
    } else if ($r === "login") {
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
    } else if ($r === "logout") {
        ctrlLogout($request, $response, $container);
    } else if ($r === "updateUser") {
        ctrlUpdateUser($request, $response, $container);
    } else {
        echo "404";
    } 

    $response->response();