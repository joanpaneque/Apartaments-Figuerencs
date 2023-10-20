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
            <h5>2023</h5>
            <?php for ($i = 0; $i < 5; $i++) { ?>
                <div class="group">
                    <div class="img">
                        <a href="?r=house">
                            <img src="../assets/img/exterior.jpg" alt="">
                        </a>
                    </div>
                    <div class="info-container">
                        <div class="text-container">
                            <a href="?r=house">El Far</a>
                            <p>Figueres</p>
                        </div>
                        <p class="right-aligned-content">
                            18 Oct
                            20 Oct
                        </p>
                    </div>
                </div>
            <?php } ?>

            <h5>2022</h5>
            <?php for ($i = 0; $i < 5; $i++) { ?>
                <div class="group">
                    <div class="img">
                        <img src="../assets/img/interior.jpg" alt="">
                    </div>
                    <div class="info-container">
                        <div class="text-container">
                            <a href="">La Maravella</a>
                            <p>Figueres</p>
                        </div>
                        <p class="right-aligned-content">
                            18 Oct
                            20 Oct
                        </p>
                    </div>
                </div>
            <?php } ?>


        </div>
    </body>

</html>