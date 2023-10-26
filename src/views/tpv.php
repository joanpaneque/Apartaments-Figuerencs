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
            <form class="row g-3">
                <div class="col-md-12">
                    <label for="card" class="form-label">Número de la tarjeta</label>
                    <input type="text" class="form-control" id="inputEmail4" required>
                </div>

                <div class="col-md-12">
                    <label for="name" class="form-label">Nom del titular</label>
                    <input type="text" class="form-control" id="inputPassword4" required>
                </div>

                <div class="col-md-2">
                    <label for="mes_i_any" class="form-label">Data caducitat:</label>
                    <input type="text" class="form-control" id="mes_i_any" name="mes_i_any" pattern="(0[1-9]|1[0-2])/\d{4}" placeholder="MM/YYYY" required>
                </div>

                <div class="col-md-2">
                    <label for="cvv" class="form-label">CVV</label>
                    <input type="text" class="form-control" placeholder="CVC">
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Pagar</button>
                </div>
            </form>
        </div>

        <script>
            document.getElementById("mes_i_any").addEventListener("input", function () {
                const input = this;
                if (input.value.length === 2 && !input.value.includes("/")) {
                    input.value += "/";
                }
            });
        </script>
    </body>
</html>