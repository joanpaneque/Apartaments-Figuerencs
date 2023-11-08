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
    <link rel="stylesheet" type="text/css" href="styles/manager.css">

    <script src="js/manager.js" type="module"></script>
    <script src="js/index.js" type="module"></script>
    <title>Booking</title>
</head>
<body>
    <?php require 'header.php' ?>
    <div class="container">
        <h1>Gestor</h1>
        <div class="manager-container">
            <aside>
                <div section="apartments">Apartaments</div>
                <div section="users">Usuaris</div>
                <div section="bookings">Reserves</div>
            </aside>
            <section sectionid="apartments">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addApartment">Crear apartament</button>
                <div id="manager-apartments">
                    
                </div>
            </section>
            <section sectionid="users">
                <div class="header"> <!-- Could not use <header> because of bootstrap annoying default styles -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUser">Crear usuari</button>
                    <div id="manager-users">
                        
                    </div>
                </div>
            </section>
            <section sectionid="bookings">
                Reserves
            </section>
        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="addUser" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="addUserModalLabel">Crear usuari</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <!-- <form id="manager-user-registration">
                <input type="hidden" name="r" value="register">
                <input type="text" name="name" class="text-input" required>
                <input type="text" name="surname" class="text-input" required>
                <input type="text" name="phone" class="text-input" required>
                <input type="text" name="email" class="text-input" required>
                <input type="password" name="password" class="text-input" required>
            <form> -->
            <form id="manager-user-registration">
                <input type="hidden" name="dologin" value="1">
                <div class="mb-3">
                    <label for="manager-name" class="form-label">Nom</label>
                    <input type="email" class="form-control" id="manager-name" name="name">
                </div>
                <div class="mb-3">
                    <label for="manager-surname" class="form-label">Cognoms</label>
                    <input type="email" class="form-control" id="manager-surname" name="surname">
                </div>
                <div class="mb-3">
                    <label for="manager-phone" class="form-label">Telèfon</label>
                    <input type="email" class="form-control" id="manager-phone" name="phone">
                </div>
                <div class="mb-3">
                    <label for="manager-email" class="form-label">Correu</label>
                    <input type="email" class="form-control" id="manager-email" name="email">
                </div>
                <div class="mb-3">
                    <label for="manager-password" class="form-label">Contrasenya</label>
                    <input type="password" class="form-control" id="manager-password" name="password">
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tancar</button>
            <button type="button" class="btn btn-primary" id="manager-add-user">Crear usuari</button>
        </div>
        </div>
    </div>
    </div>
    <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
</body>
</html>