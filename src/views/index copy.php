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

        <!-- MODAL COOKIES -->
        <div class="modal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <p>Modal body text goes here.</p>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        
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
            </nav>


            <!-- CAROUSEL -->
            <div id="carouselExampleFade" class="carousel slide carousel-fade" >
                <div class="carousel-inner" id="carousel-index">
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Anterior</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Següent</span>
                </button>
            </div>

            <div id="apartments" class="apartments row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-3 g-lg-4">
            </div>
        </div>

        <?php require 'footer.php' ?>



        <script src="cookies.js"></script>
    </body>

</html>
