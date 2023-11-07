<!DOCTYPE html>
<html lang="ca">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="assets/img/logo-transparent.png" type="image/x-icon">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="/styles/reservation.css">
        <link rel="stylesheet" href="/styles/global.css">
        <title>Reservations</title>
    </head>

    <body>

        <?php 
            include("header.php");
        ?>
        
        <div class="container">
            <h1>Reserves</h1>
            <?php if (empty($reservations["reservations"])) { ?>
                <p class="alert alert-warning">No tens cap reserva</p>
            <?php } ?>
            <?php for ($i = 0; $i < count($reservations["reservations"]); $i++) { ?>
                <div class="group">
                    <div class="img">
                        <a href="?r=house">
                            <img src="<?= $reservations["apartments"][$i]["url"] ?>" alt="apartment">
                        </a>
                    </div>
                    <div class="info-container">
                        <div class="text-container">
                            <a href="?r=house"><?= $reservations["apartments"][$i]["title"] ?></a>
                            <p><?= dateToCatalan($reservations["reservations"][$i]["booking_date"]) ?></p>
                        </div>
                        <?php 
                            $date1 = intval(str_replace("-", "", $reservations["reservations"][$i]["date1"]));
                            $date2 = intval(str_replace("-", "", $reservations["reservations"][$i]["date2"]));
                            $today = intval(str_replace("-", "", date("Y-m-d")));
                        ?>
                        <?php if ($reservations["reservations"][$i]["cancelled"] != "1") { ?>
                            <?php if ($date1 > $today) { ?>
                                <p style="color: #00EE00; font-weight: bold">Reserva pendent</p>
                                <a href="?r=cancel&booking_id=<?=$reservations["reservations"][$i]["code"]?>">Cancelar reserva</a>
                            <?php } else if ($date2 < $today) { ?>
                                <p style="color: #EE0000; font-weight: bold">Reserva finalitzada</p>
                            <?php } else { ?>
                                <p style="color: #EEAA00; font-weight: bold">Reserva en curs</p>
                            <?php } ?>
                        <?php } else { ?>
                            <p style="color: #EE0000; font-weight: bold">Reserva cancelada</p>
                        <?php } ?>
                        <a href="?r=bookingpdf&booking_id=<?=$reservations["reservations"][$i]["code"]?>">Descargar pdf</a>
                        <p class="right-aligned-content">
                            <span class="dateMinified"><?= dateToCatalan($reservations["reservations"][$i]["date1"]) ?></span>
                            <span class="dateMinified"><?= dateToCatalan($reservations["reservations"][$i]["date2"]) ?></span>
                        </p>
                    </div>
                </div>
            <?php } ?>

        </div>
    </body>

</html>