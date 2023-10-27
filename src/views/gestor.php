<!DOCTYPE html>
<html lang="ca">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="assets/img/logo-transparent.png" type="image/x-icon">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="/styles/gestor.css">
        <title>Gestor</title>
    </head>
    
    <body>
        <?php require "header.php"; ?>


        <div class="container">
            <div class="row mt-4">
                <div class="col-md-7">
                    <a href="index.php?r=form" class="btn btn-danger">Afegir</a>
                </div>
                
            </div>  
        </div>


        <div class="col">
            <table class="table">
                <tr>
                    <th></th>
                    <th>#</th>
                    <th>Codi</th>
                    <th>Títol</th>
                    <th>Url</th>
                    <th></th>
                </tr>

                <?php
                    for ($i = 1; $i <= 10; $i++) {
                ?>
                    <tr>
                        <td></td>
                        <td><img src="../assets/img/pool.jpg" alt="" class="img-fluid rounded" width="128"></td>
                        <td><?php echo $i ?></td>
                        <td>El Far</td>
                        <td>aldskjflakj</td>
                        <td><a href="" class="btn btn-danger">Esborrar</a></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
        

    </body>

</html>
