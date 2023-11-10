<!DOCTYPE html>
<html lang="ca">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Footer</title>
    </head>

    <body>
        <footer class="py-3 my-4">
            <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                <?php
                    $showAdminPanel = false;
                    if ($permissions) {
                        foreach ($permissions as $permission) {
                            if ($permission["name"] === "management_panel") {
                                $showAdminPanel = true;
                            }
                            if ($permission["name"] === "admin") {
                                $showAdminPanel = true;
                            }
                        }
                    }
                ?>
                <li><a class="nav-link px-2 text-body-secondary" href="?r=information">Perfil</a></li>
                <?php if ($showAdminPanel) { ?>
                    <li><a class="nav-link px-2 text-body-secondary" href="?r=manager">Gestor</a></li>
                <?php } ?>
                <li><a class="nav-link px-2 text-body-secondary" href="?r=logout">Tancar sessió</a></li>
            </ul>
            <p class="text-center text-body-secondary">© <?php echo date("Y"); ?> Apartmanets Figuerencs</p>
        </footer>
    </body>

</html>
