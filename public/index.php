<?php

// Configuration
include "../src/config.php";

// Controllers
include "../src/controllers/index.php";
include "../src/controllers/json-apartments.php";

// Rutes
$r = $_REQUEST["r"] ?? "";

if ($r == "") {
    ctrlIndex();
} else if ($r == "json-apartments") {
    ctrlJsonApartments();
} else {
    echo "404";
}