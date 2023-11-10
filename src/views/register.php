<!DOCTYPE html>
<html lang="ca">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="assets/img/logo-transparent.png" type="image/x-icon">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="/styles/register.css">
        <title>Register</title>
    </head>

    <body>
        <div class="main-container">
            <img src="../assets/img/pool.jpg" class="background-img" alt="Outside Pool">

            <div class="login-container">
                <h1>Registre't</h1>

                <form action="">
                    <input type="hidden" name="dologin" value="1">
                    <input type="hidden" name="r" value="register">
                    <label for="name">
                        <h5>Nom:</h5>
                        <input type="text" name="name" class="text-input" required>
                    </label>

                    <label for="surname">
                        <h5>Cognoms:</h5>
                        <input type="text" name="surname" class="text-input" required>
                    </label>
                    
                    <label for="mobile">
                        <h5>Telefon:</h5>
                        <input type="text" name="phone" class="text-input" required>
                    </label>

                    <label for="mail">
                        <h5>Correu:</h5>
                        <input type="text" name="email" class="text-input" required>
                    </label>
                    
                    <label for="password">
                        <h5>Contrasenya:</h5>
                        <input type="password" name="password" class="text-input" required>
                    </label>
                    
                    <button>Enviar</button>

                </form>

                <a href="?r=login">Ja tens compte?</a>
            </div>
        </div>
    </body>

</html>