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
    <link rel="stylesheet" type="text/css" href="styles/index.css">
    <link rel="stylesheet" type="text/css" href="styles/calendar.css">
    <link rel="stylesheet" type="text/css" href="styles/global.css">
    <link rel="stylesheet" type="text/css" href="styles/FloatingWindow.css">
    <script src="js/index.js" type="module"></script>
    <title>Index</title>
</head>
<body>
    <?php require 'header.php' ?>
    
    <div class="container">
        <nav class="row booking-inputs">
            <form id="date-form" class="col-10">
                <input type="submit" class="hidden" name="dummy" id="dummy" value="dummy">
                <div class="apartment-dates">
                    <div class="date-container date-entry">
                        <label for="date-entry" class="left">Arribada</label>
                        <input name="date-entry" placeholder="Introdueix la data d'entrada" type="text" id="date-entry" class="nav-input">
                    </div>
                    <div class="date-container date-exit">
                        <label for="date-exit">Sortida</label>
                        <input name="date-exit" placeholder="Introdueix la data de sortida" type="text" id="date-exit" class="nav-input">
                    </div>
                    <div class="date-container people">
                        <label for="people">Viatjers</label>
                        <input name="people" type="text" id="people" value="1" class="nav-input">
                    </div>
                </div>
            </form>
            <div class="col-2">
                <img class="icon" src="assets/svg/settings-sliders.svg" alt="Filtres">
            </div>
        </nav>
        <div id="apartments" class="apartments row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-3 g-lg-4">
    <!-- Contenido de las columnas -->
</div>




    </div>
</body>
</html>
