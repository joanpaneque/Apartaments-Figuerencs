<!DOCTYPE html>
<html lang="ca">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="../assets/img/logo-transparent.png" type="image/x-icon">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="/styles/tpv.css">
        <title>TPV</title>
    </head>

    <body>

        <?php
            include("header.php");
        ?>

        <!-- CONAINER -->
        <div class="container">
            <form method="post">
                <div class="mb-3 col-4">
                    <label for="card" class="form-label">Número de la tarjeta</label>
                    <input type="text" inputmode="numeric" maxlength="24" class="form-control" id="cardInput" required>
                </div>

                <div class="mb-3 col-4">
                    <label for="name" class="form-label">Nom del titular</label>
                    <input type="text" class="form-control" id="inputPassword" required>
                </div>

                <div class="mb-2 col-2">
                    <label for="mes_i_any" class="form-label">Data caducitat:</label>
                    <input type="text" class="form-control" id="mes_i_any" name="mes_i_any" pattern="(0[1-9]|1[0-2])/\d{4}" maxlength="7" placeholder="MM/YYYY" required>
                </div>

                <div class="mb-2 col-2">
                    <label for="cvv" class="form-label">CVV</label>
                    <input type="text" class="form-control" maxlength="3" placeholder="CVC">
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Pagar</button>
                </div>
            </form>
        </div>

        <script>
            // Nomes poder escriure any i mes i posar barra automaticament despres del mes
            document.getElementById("mes_i_any").addEventListener("input", function () {
                const input = this;
                const value = input.value;

                if (value.length === 2 && !value.includes("/")) {
                    input.value = value + "/";
                }
            });


            // Posar espai cada 4 numeros
            document.getElementById("cardInput").addEventListener("input", function (e) {
                // Valor actual de input, eliminant els espais i tot el que no son numeros
                let inputValue = this.value.replace(/[^0-9]/g, '');

                let comprovarEspai = '';

                for (let i = 0; i < inputValue.length; i++) {
                    // Afegir un espai cada quatre numeros
                    if (i > 0 && i % 4 === 0) {
                        comprovarEspai += ' ';
                    }

                    comprovarEspai += inputValue[i];
                }

                this.value = comprovarEspai;
            });

        </script>
    </body>
</html>