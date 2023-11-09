<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js"
        integrity="sha256-eTyxS0rkjpLEo16uXTS0uVCS4815lc40K2iVpWDvdSY=" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="assets/img/logo-transparent.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="styles/global.css">
    <link rel="stylesheet" type="text/css" href="styles/createApartment.css">

    <title>Crear apartament</title>
</head>

<body>


    <!--
+-------------------+---------------+------+-----+---------+----------------+
| Field             | Type          | Null | Key | Default | Extra          |
+-------------------+---------------+------+-----+---------+----------------+
| price_off_season  | decimal(10,2) | YES  |     | NULL    |                |
| price_peak_season | decimal(10,2) | YES  |     | NULL    |                |
| rooms             | int(11)       | YES  |     | NULL    |                |
| square_meters     | decimal(8,2)  | YES  |     | NULL    |                |
| longitude         | decimal(10,6) | YES  |     | NULL    |                |
| latitude          | decimal(10,6) | YES  |     | NULL    |                |
| date1_peak_season | date          | YES  |     | NULL    |                |
| date2_peak_season | date          | YES  |     | NULL    |                |
| postal_address    | varchar(255)  | YES  |     | NULL    |                |
| title             | varchar(255)  | YES  |     | NULL    |                |
| short_description | text          | YES  |     | NULL    |                |
| code              | int(11)        | NO   | PRI | NULL    | auto_increment |
| capacity          | int(11)       | YES  |     | NULL    |                |
| entry_time        | varchar(6)    | YES  |     | NULL    |                |
| user_code         | int(11)       | YES  |     | NULL    |                |
+-------------------+---------------+------+-----+---------+----------------+
-->
    <?php require 'header.php' ?>
    <div class="container">
        <h1>Creació d'apartament</h1>
        <form method="POST" action="?r=createApartment" enctype="multipart/form-data">
            <input type="hidden" value="1" name="doCreate">
            <div class="mb-3">
                <label for="title" class="form-label">Títol</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>
            <div class="mb-3">
                <label for="short_description" class="form-label">Descripció curta</label>
                <textarea class="form-control" id="short_description" rows="3" name="short_description"></textarea>
            </div>
            <div class="mb-3">
                <label for="postal_address" class="form-label">Adreça postal</label>
                <input type="text" class="form-control" id="postal_address" value="17600" name="postal_address">
            </div>
            <div class="mb-3">
                <label for="capacity" class="form-label">Capacitat (persones)</label>
                <input type="number" class="form-control" id="capacity" placeholder="Ex: 5" name="capacity">
            </div>
            <div class="mb-3">
                <label for="rooms" class="form-label">Habitacions</label>
                <input type="number" class="form-control" id="rooms" placeholder="Ex: 3" name="rooms">
            </div>
            <div class="mb-3">
                <label for="square_meters" class="form-label">Metres quadrats</label>
                <input type="number" class="form-control" id="square_meters" placeholder="Ex: 100" name="square_meters">
            </div>
            <div class="mb-3">
                <label for="entry_time" class="form-label">Hora d'entrada</label>
                <input type="time" class="form-control" id="entry_time" placeholder="Ex: 16:00" name="entry_time">
            </div>
            <div class="mb-3">
                <label for="price_off_season" class="form-label">Preu temporada baixa</label>
                <input type="number" class="form-control" id="price_off_season" placeholder="Ex: 100" name="price_off_season">
        
            </div>
            <div class="mb-3">
                <label for="price_peak_season" class="form-label">Preu temporada alta</label>
                <input type="number" class="form-control" id="price_peak_season" placeholder="Ex: 200" name="price_peak_season">
            </div>

            <h2>Temporades</h2>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addSeason">Afegir
                temporada</button>
            <div id="seasons">

            </div>

            <div class="mb-3" style="margin-top: 20px">
                <label for="images">Seleccionar imatges:</label>
                <input type="file" class="form-control-file" name="images[]" id="images" multiple accept="image/*">
            </div>

            <!-- Modal -->
            <div class="modal fade" id="addSeason" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5">Afegir temporada</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Tancar"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Date 1 -->
                            <div class="mb-3">
                                <label for="date1" class="form-label">Data 1</label>
                                <input type="date" class="form-control" id="date1">
                                <div class="form-text">Data d'inici de la temporada</div>
                            </div>
                            <!-- Date 2 -->
                            <div class="mb-3">
                                <label for="date2" class="form-label">Data 2</label>
                                <input type="date" class="form-control" id="date2">
                                <div class="form-text">Data de finalització de la temporada</div>
                                <div>
                                    <!-- Peak or off season radius -->
                                    <div class="mb-3">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked"
                                            checked>
                                        <label class="form-check-label" for="flexCheckChecked">
                                            Temporada alta
                                        </label>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal"
                                        id="confirmAdd">Afegir</button>
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Tancar</button>
                                </div>
                                <script>
                                    $("#confirmAdd").on("click", () => {
                                        let date1 = $("#date1").val();
                                        let date2 = $("#date2").val();
                                        let peak = $("#flexCheckChecked").is(":checked");
                                        let season = {
                                            date1: date1,
                                            date2: date2,
                                            peak: peak
                                        };
                                        let seasonHtml = `
                                            <div class="season">
                                                <div class="season-date1">${date1}</div>
                                                <div class="season-date2">${date2}</div>
                                                <div class="season-peak">${peak ? "Temporada alta" : "Temporada baixa"}</div>
                                            </div>
                                            <input type="hidden" name="seasons[]" value='${JSON.stringify(season)}'>
                                        `;
                                        $("#seasons").append(seasonHtml);
                                        // Reset modal form
                                        $("#date1").val("");
                                        $("#date2").val("");
                                        $("#flexCheckChecked").prop("checked", true);
                                    });
                                </script>
                                <style>

                                    #seasons {
                                        min-height: 50px;
                                        background: #ececec;
                                        margin-top: 20px;
                                    }
                                    .season {
                                        display: flex;
                                        width: 100%;
                                        gap: 40px;
                                        background: #ececec;
                                    }

                                    .season:not(:last-child) {
                                        border-bottom: 1px solid #ccc;
                                    }
 
                                    .season div {
                                        width: 100%;
                                        background: #eee;
                                        padding: 15px 10px;
                                        border-radius: 15px;
                                    }

                                    .createApartment {
                                        margin-top: 20px;
                                    }
                                    
                                </style>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary createApartment">Crear apartament</button>
        </form>
    </div>
    <?php require 'footer.php' ?>
</body>

</html>