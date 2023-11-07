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


function dateToCatalan($date) {
    $mesosCatala = [
        1 => "Gen",
        2 => "Feb",
        3 => "Març",
        4 => "Abr",
        5 => "Maig",
        6 => "Juny",
        7 => "Jul",
        8 => "Ag",
        9 => "Set",
        10 => "Oct",
        11 => "Nov",
        12 => "Des"
    ];

    $day = date('j', strtotime($date));
    $month = $mesosCatala[date('n', strtotime($date))];
    return $day . " " . $month;
}