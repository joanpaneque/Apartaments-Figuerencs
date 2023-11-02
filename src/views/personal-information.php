<!DOCTYPE html>
<html lang="ca">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="assets/img/logo-transparent.png" type="image/x-icon">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="/styles/personal-information.css">
        <link rel="stylesheet" href="/styles/global.css">
        <title>Informació Personal</title>
    </head>

    <body>

        <?php require 'header.php' ?>

        
        <div class="container">

            <div class="center">

                <div class="user">
                    Benvingut,
                    <br>
                    Paneque, <b>Joan</b>
                </div>

                <br>

                <div class="form">
                    <form action="">
                        <div class="mb-3 col-3">
                            <div class="title">
                                Nom:
                            </div>

                            <div class="info">
                                <input type="text" value="Joan">
                                <img src="../assets/svg/pencil.svg" alt="Editar">
                            </div>
                        </div>

                        <div class="mb-3 col-3">
                            <div class="title">
                                Cognom:
                            </div>

                            <div class="info">
                                <input type="text" value="Paneque">
                                <img src="../assets/svg/pencil.svg" alt="Editar">
                            </div>
                        </div>

                        <div class="mb-3 col-3">
                            <div class="title">
                                Correu:
                            </div>

                            <div class="info">
                                <input type="email" value="joanpaneque@cendrassos.net">
                                <img src="../assets/svg/pencil.svg" alt="Editar">
                            </div>
                        </div>

                        <div class="mb-3 col-3">
                            <div class="title">
                                Telèfon:
                            </div>

                            <div class="info">
                                <input type="tel" value="123456789">
                                <img src="../assets/svg/pencil.svg" alt="Editar" id="editButton" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </body>

</html>