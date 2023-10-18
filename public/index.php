<?php

// Configuration
    include "../src/config.php";

    include "../src/controllers/login.php";
    include "../src/controllers/register.php";
    include "../src/controllers/personal-information.php";
    include "../src/controllers/reservation.php";
    include "../src/controllers/index.php";
    include "../src/controllers/json-apartments.php";

    
    $r = $_REQUEST["r"] ?? "";


    if ($r == "") {
        ctrlIndex();
    } else if ($r == "json-apartments") {
        ctrlJsonApartments();
    } else if ($r === "login") {
        ctrlLogin();
    } elseif ($r === "register") {
        ctrlRegister();
    } elseif ($r === "information") {
        ctrlPersonalInformation();
    } elseif ($r === "reservation") {
        ctrlReservation();
    } else {
        echo "404";
    }
