<!DOCTYPE html>
<html lang="ca">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="assets/img/logo-transparent.png" type="image/x-icon">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="/styles/login.css">
        <title>Login</title>
    </head>
    <body>
        <div class="main-container">
            <img src="../assets/img/pool.jpg" class="background-img" alt="Outside Pool">
            <div class="login-container">
                <h1>Login</h1>
                <form>
                    <input type="hidden" name="r" value="login">
                    <label for="mail">Correu</label>
                    <input type="text" name="email" class="text-input" required>
                    <label for="password">Contrasenya</label>
                    <input type="text" name="password" class="text-input" required>
                    <button>Enviar</button>
                </form>
                <a href="?r=register">No tens compte?</a>
            </div>
        </div>
    </body>

</html>