<?php

<<<<<<< HEAD
=======
<<<<<<< HEAD
function ctrlIndex() {
    include "../src/views/index.php";
=======
>>>>>>> 9086ec6 (Commit random)
function ctrlIndex($request, $response, $container) {
    $response->setTemplate("index.php");

    return $response;
<<<<<<< HEAD
=======
>>>>>>> cbcda2440f124f880131c371aecf18d8220afec4
>>>>>>> 9086ec6 (Commit random)
}