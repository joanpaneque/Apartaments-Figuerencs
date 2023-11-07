<!DOCTYPE html>
<html lang="ca">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="assets/img/logo-transparent.png" type="image/x-icon">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="/styles/reservation.css">
        <title>Reservations</title>
    </head>

    <body>

        <?php 
            include("header.php");
        ?>
        
        <div class="container">
            <h1>Reserves</h1>
            <?php for ($i = 0; $i < count($reservations["reservations"]); $i++) { ?>
                <div class="group">
                    <div class="img">
                        <a href="?r=house">
                            <img src="../assets/img/exterior.jpg" alt="Exterior">
                        </a>
                    </div>
                    <div class="info-container">
                        <div class="text-container">
                            <a href="?r=house"><?= $reservations["apartments"][$i]["title"] ?></a>
                            <p>Figueres</p>
                        </div>
                        <a href="?r=bookingpdf&booking_id=<?=$reservations["reservations"][$i]["code"]?>">Descargar pdf</a>
                        <a href="?r=bookingpdf&booking_id=<?=$reservations["reservations"][$i]["code"]?>">Cancelar reserva</a>

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