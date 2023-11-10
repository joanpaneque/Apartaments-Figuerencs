<?php

use Dompdf\Dompdf;

function ctrlBookingPDF($request, $response, $container) {
    $booking_code = $request->get(INPUT_GET, "booking_id");
    
    $apartment = $container->apartments()->getReservation($container->userid, $booking_code);

    if (!$apartment) {
        $response->redirect("location: index.php");
        return $response;
    }

    $userinfo = $container->user()->getData($apartment["reservation"]["user_code"]);


    $html = "<h1>Reserva feta</h1>";
    $html .= "<p>Has realitzat la teva reserva correctament a l'apartament " . $apartment["apartment"]["title"] . "</p>";
    $html .= "<p>El teu codi de reserva és: " . $apartment["reservation"]["code"] . "</p>";
    $html .= "<p>Titular de la reserva: " . $userinfo["email"] . "</p>";
    
    $dompdf = new Dompdf($html);
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'landscape');
    $dompdf->render();
    $dompdf->stream();
}
