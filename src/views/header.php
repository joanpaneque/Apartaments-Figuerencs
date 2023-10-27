<!DOCTYPE html>
<html lang="ca">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/styles/header.css">
        <title>Header</title>
    </head>
    
    <body>

        <header class="header navbar bg-light fixed-top">
            <a href="/">
                <img src="../assets/img/logo-transparent.png" class="main-logo" alt="Logo">
            </a>

            <div class="dropdown">
                <button type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="d-flex flex-column align-items-center justify-content-center">
                        <div class="user-logo">
                            <img src="../assets/svg/menu-burger.svg" alt="Burger">
                            <img src="../assets/svg/user.svg" alt="User">
                        </div>
                    </div>
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="?r=login">Login</a></li>
                    <li><a class="dropdown-item" href="?r=register">Register</a></li>
                    <li><a class="dropdown-item" href="?r=gestor">Gestor</a></li>
                </ul>
            </div>

        </header>
    </body>

</html>
