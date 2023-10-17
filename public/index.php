<?php

// Configuration
include "../src/config.php";

// Controllers
include "../src/controllers/index.php";

// Rutes
$r = $_REQUEST["r"] ?? "";

if ($r == "") {
    ctrlIndex();
}