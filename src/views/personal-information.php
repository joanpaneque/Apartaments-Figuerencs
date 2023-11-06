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
                    <?= $user["surname"] ?>, <b><?= $user["name"] ?></b>
                </div>

                <br>

                <div class="form">
                    <form action="index.php" method="POST">
                        <input type="hidden" name="r" value="updateUser">

                        <div class="mb-3 col-3">
                            <div class="title">
                                Correu:
                            </div>

                            <div class="info">
                                <input type="email" name="email" value="<?= $user["email"] ?>">
                            </div>
                        </div>

                        <div class="mb-3 col-3">
                            <div class="title">
                                Nom:
                            </div>

                            <div class="info">
                                <input type="text" name="name" value="<?= $user["name"] ?>" class="image-input">
                            </div>
                        </div>

                        <div class="mb-3 col-3">
                            <div class="title">
                                Cognom:
                            </div>

                            <div class="info">
                                <input type="text" name="surname" value="<?= $user["surname"] ?>" class="image-input">
                            </div>
                        </div>

                        <div class="mb-3 col-3">
                            <div class="title">
                                Telèfon:
                            </div>

                            <div class="info">
                                <input type="phone" name="phone" value="<?= $user["phone"] ?>" class="image-input">
                            </div>
                        </div>

                        <div class="mb-3 col-5">
                            <div class="title">
                                Número tarjeta:
                            </div>

                            <div class="info">
                                <input type="text" name="card_number" value="<?= $user["card_number"] ?>" class="image-input">
                            </div>
                        </div>

                        <div class="mb-3 col-5">
                            <div class="title">
                                CVC de la tarjeta:
                            </div>

                            <div class="info">
                                <input type="text" name="cvc" value="<?= $user["cvc"] ?>" maxlength="3" class="image-input">
                            </div>
                        </div>

                        <div class="mb-3 col-5">
                            <div class="title">
                                Data de caducitat:
                            </div>

                            <div class="info">
                                <input type="month" name="card_date" value="<?= $user["card_date"] ?>">
                            </div>
                        </div>


                        <button type="submit" class="btn btn-primary">Actualitzar</button>
                    </form>
                </div>

            </div>
        </div>
    </body>

</html>
