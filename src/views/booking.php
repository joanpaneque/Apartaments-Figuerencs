<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js" integrity="sha256-eTyxS0rkjpLEo16uXTS0uVCS4815lc40K2iVpWDvdSY=" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="assets/img/logo-transparent.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="styles/global.css">
    <script src="js/index.js" type="module"></script>
    <title>Booking</title>
</head>
<body>
    <?php require 'header.php' ?>
    <div class="container">
        <?php if ($reservation) { ?>
            <?php print_r($reservation["reservation"]) ?>
            <br>
            <br>
            <?php print_r("") ?>
            <h1>Reserva feta</h1>
            <p>Has realitzat la teva reserva correctament a l'apartament "<?= $reservation["apartment"]["title"] ?>"</p>
            <p>El teu codi de reserva és: <?= $reservation["apartment"]["title"] ?></p>
        <?php } else { ?>
            <h1>Reserva no feta</h1>
        <?php } ?>
        <a href="&r=">Tornar</a>
    </div>
</body>
</html>