<?php

function convertDDMMYYYYToYYYYMMDD($date) {
    $dateParts = explode("/", (string)$date);
    $day = str_pad($dateParts[0], 2, "0", STR_PAD_LEFT);
    $month = str_pad($dateParts[1], 2, "0", STR_PAD_LEFT);
    $year = $dateParts[2];
    return $year . "-" . $month . "-" . $day;
}

function isDDMMYYYYDate($date) {
    $dateParts = explode("/", (string)$date);
    if (count($dateParts) != 3) {
        return false;
    }
    $day = (int)$dateParts[0];
    $month = (int)$dateParts[1];
    $year = (int)$dateParts[2];
    if ($day < 1 || $day > 31 || $month < 1 || $month > 12 || $year < 1000 || $year > 9999) {
        return false;
    }
    return true;
}
