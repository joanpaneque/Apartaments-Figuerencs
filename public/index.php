<?php

<<<<<<< HEAD
    // Configuration
    include "../src/config.php";
=======
<<<<<<< HEAD
// Configuration
include "../src/config.php";
>>>>>>> 9086ec6 (Commit random)

    // Models
    include "../src/models/connection.php";
    include "../src/models/apartments.php"; 

    // Emeset library
    include "../src/Emeset/Container.php";
    include "../src/Emeset/Request.php";
    include "../src/Emeset/Response.php";

<<<<<<< HEAD
=======
if ($r == "") {
    ctrlIndex();
} else if ($r == "json-apartments") {
    ctrlJsonApartments();
} else {
    echo "404";
}
=======
    // Configuration
    include "../src/config.php";

    // Models
    include "../src/models/connection.php";
    include "../src/models/apartments.php"; 

    // Emeset library
    include "../src/Emeset/Container.php";
    include "../src/Emeset/Request.php";
    include "../src/Emeset/Response.php";

>>>>>>> 9086ec6 (Commit random)
    $request = new \Emeset\Request();
    $response = new \Emeset\Response();
    $container = new \Emeset\Container($config);

    // Controllers
    include "../src/controllers/login.php";
    include "../src/controllers/register.php";
    include "../src/controllers/personal-information.php";
    include "../src/controllers/reservation.php";
    include "../src/controllers/index.php";
    include "../src/controllers/apartments.php";
    include "../src/controllers/house.php";
    
    $r = $_REQUEST["r"] ?? "";

    if ($r == "") {
        ctrlIndex($request, $response, $container);
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
    } else {
        echo "404";
    } 

    $response->response();
<<<<<<< HEAD
=======
>>>>>>> cbcda2440f124f880131c371aecf18d8220afec4
>>>>>>> 9086ec6 (Commit random)
