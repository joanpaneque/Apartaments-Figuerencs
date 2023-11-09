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
                <?php
                    $showAdminPanel = false;
                    if ($permissions) {
                        foreach ($permissions as $permission) {
                            if ($permission["name"] === "management_panel") {
                                $showAdminPanel = true;
                            }
                        }
                    }
                ?>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="?r=information">Perfil</a></li>
                    <?php if ($showAdminPanel) { ?>
                        <li><a class="dropdown-item" href="?r=register">Gestor</a></li>
                    <?php } ?>
                    <li><a class="dropdown-item" href="?r=reservation">Reserves</a></li>
                    <li><a class="dropdown-item" href="?r=logout">Tancar sessió</a></li>
                </ul>
            </div>

        </header>
    </body>
    
</html>
