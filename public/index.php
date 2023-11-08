<?php

    // Vendor
    include "../vendor/autoload.php";

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
    include "../src/controllers/booking.php";
    include "../src/controllers/bookingpdf.php";
    include "../src/controllers/cancel.php";
    include "../src/controllers/cookies.php";
    include "../src/controllers/manager.php";
    include "../src/controllers/users.php";

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

    // Controller variables
    $userid = $request->get("SESSION", "userid");
    
    // Global variables
    $response->set("userid", $userid);
    $response->set("permissions", $request->get("SESSION", "permissions"));

    $container->setUserId($userid);
    
    $r = $_REQUEST["r"] ?? "";

    if ($r == "") {
        middleIsLogged($request, $response, $container, "ctrlIndex");
    } else if ($r == "apartments") {
        middleIsLogged($request, $response, $container, "ctrlApartments");
    } else if ($r === "login") {
        ctrlLogin($request, $response, $container);
    } elseif ($r === "register") {
        ctrlRegister($request, $response, $container);
    } elseif ($r === "information") {
        middleIsLogged($request, $response, $container, "ctrlPersonalInformation");
    } elseif ($r === "reservation") {
        middleIsLogged($request, $response, $container, "ctrlReservation");
    } elseif ($r === "house") {
        middleIsLogged($request, $response, $container, "ctrlHouse");
    } elseif ($r === "tpv") {
        middleIsLogged($request, $response, $container, "ctrlTpv");
    } else if ($r === "logout") {
        middleIsLogged($request, $response, $container, "ctrlLogout");
    } else if ($r === "updateUser") {
        middleIsLogged($request, $response, $container, "ctrlUpdateUser");
    } else if ($r === "booking") {
        middleIsLogged($request, $response, $container, "ctrlBooking");
    } else if ($r === "bookingpdf") {
        middleIsLogged($request, $response, $container, "ctrlBookingPDF");
    } else if ($r === "cancel") {
        middleIsLogged($request, $response, $container, "ctrlCancel");
    } else if ($r === "cookies") {
        ctrlAcceptCookies($request, $response, $container);
    } else if ($r === "manager") {
        middleIsLogged($request, $response, $container, "ctrlManager");
    } else if ($r === "users") {    
        middleIsLogged($request, $response, $container, "ctrlUsers");
    } else {

    }

    $response->response();