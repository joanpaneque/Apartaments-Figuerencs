<!DOCTYPE html>
<html lang="ca">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="assets/img/logo-transparent.png" type="image/x-icon">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
        <link rel="stylesheet" href="/styles/house.css">
        <link rel="stylesheet" href="/styles/global.css">
        <title>Casa</title>
    </head>

    <body>

        <?php require 'header.php' ?>

        <div class="container">
            <!-- CONTAINER INFO -->
            <div class="info">

                <div class="image">
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true" data-bs-interval="9999999">
                        <div class="carousel-inner">
                            <?php foreach ($images as $index => $image) { ?>
                                <div class="carousel-item 
                                    <?php
                                        if ($index === 0) {
                                            echo 'active';
                                        } else {
                                            echo '';
                                        }
                                    ?>">
                                    <img src="<?= $image ?>" class="d-block w-100" alt="Imatge <?= $index ?>">
                                </div>
                            <?php }; ?>
                        </div>
                        <div class="carousel-indicators">
                            <?php 
                                foreach ($images as $index => $image) { ?>
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?= $index ?>" 
                                    <?php 
                                        if ($index === 0) {
                                            echo 'class="active"'; 
                                        }
                                    ?> 
                                    aria-label="Slide <?= $index + 1 ?>"></button>
                            <?php } ?>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>


                    <div class="reservation-container">
                        <div class="dates-hosts">
                            <h4>Dates i Hostes</h4>
                            <div class="dates">
                                <ul>
                                    <div class="text-container">
                                        <p>Dates</p>
                                    </div>
                                </ul>
                                <p class="right-aligned-content">
                                    <span>
                                        <?php
                                            $mesosCatala = [
                                                1 => "Gen",
                                                2 => "Feb",
                                                3 => "Març",
                                                4 => "Abr",
                                                5 => "Maig",
                                                6 => "Juny",
                                                7 => "Jul",
                                                8 => "Ag",
                                                9 => "Set",
                                                10 => "Oct",
                                                11 => "Nov",
                                                12 => "Des"
                                            ];


                                            $dia = date('j', strtotime($dateEntry));
                                            $mes = $mesosCatala[date('n', strtotime($dateEntry))];

                                            echo $dia . " " . $mes;
                                        ?>
                                    </span>
                                    
                                    <span>
                                        <?php
                                            $dia = date('j', strtotime($dateExit));
                                            $mes = $mesosCatala[date('n', strtotime($dateExit))];

                                            echo $dia . " " . $mes;
                                        ?>
                                    </span>
                                </p>

                            </div>

                            <div class="hosts">
                                <ul>
                                    <div class="text-container">
                                        <p>Viatjers</p>
                                    </div>
                                </ul>
                               <p class="right-aligned-content">
                                    <?= $people ?> viatjers
                                </p>
                            </div>
                        </div>

                        <div class="price">
                            <h4>Preu</h4>
                            <div class="info-price">
                                <ul>
                                    <div class="text">
                                        <p>Preu per nit</p>
                                    </div>
                                </ul>    
                                <p class="right-aligned-content number"><?= $pricePeakSeason ?>€</p>
                            </div>
                            <div class="nights">
                                <ul>
                                    <div class="text">
                                        <p>Número de nits</p>
                                    </div>
                                </ul>    
                                <p class="right-aligned-content number">
                                    <?php

                                        // Canvia el format per mostrar-les
                                        $dateEntryFormatted = date('d/m/Y', strtotime($dateEntry));
                                        $dateExitFormatted = date('d/m/Y', strtotime($dateExit));

                                        // Les dues dates que vols comparar
                                        $data1 = new DateTime($dateEntry);
                                        $data2 = new DateTime($dateExit);

                                        // Calcula la diferencia en dies entre les dues dates
                                        $diferencia = $data1->diff($data2);

                                        $nombreNits = $diferencia->days;

                                        echo $nombreNits;
                                    ?>
                                </p>
                            </div>

                            <div class="total">
                                <ul>
                                    <div class="text">
                                        <p>Total</p>
                                    </div>
                                </ul>
                                <p class="right-aligned-content number">
                                    <?php
                                        $total = $pricePeakSeason * $nombreNits;
                                        
                                        // Afegeix .00
                                        echo number_format($total, 2);
                                    ?>€
                                </p>
                            </div>
                        </div>
    
                        <div class="container-button">
                            <a href="?r=booking&date-entry=<?=$dateEntry?>&date-exit=<?=$dateExit?>&people=<?=$people?>&apartment-code=<?=$apartmentCode?>">
                                <button type="button" class="btn btn-primary">Reserva</button>
                            </a>
                        </div>
                    </div>
                </div>


                <div class="paragraph">
                    <h1><?= $name ?></h1>
                    <h5>Figueres, Catalunya</h5>
                    <h5 class="postal"><?= $postalAddress ?></h5>
                    <h6>
                        <?php
                            if ($rooms == 1) {
                                echo "1 dormitori";
                            } else {
                                echo $rooms . " dormitoris ";
                            }
                        ?>
                    </h6>

                </div>
                
            </div>


            <!-- CONTAINER DESCRIPTION -->
            <div class="description">
                <h4>Descripció</h4>

                <p><?= nl2br($shortDescription) ?></p>
                <!-- nl2br is used to apply the integers in the database  -->

                <p>
                    Aquest espai està en un terreny de <?= $squareMeters ?> m².
                </p>
            </div>



            <!-- CONTAINER OFFERS -->
            <div class="offers">
                <h4>Que ofereix?</h4>
                <ul>
                    <?php
                        // Combina els elements amb salts de linia
                        $servicesList = implode("\n", $services);
                        // Genera una unica llista amb els elements
                        echo '<li>' . str_replace("\n", '</li><li>', $servicesList) . '</li>';

                        // we don't do a foreach because the bbdd is set up in a way that a list wouldn't be made, that's why I do the implode
                        // we don't use nl2br like the description because then we lose the dots of the list
                    ?>
                </ul>
            </div>



            <!-- CONTAINER MAP -->
            <div class="map-container">
                <h4>Ubicació</h4>
                <div id="map" data-latitude="<?= $latitude ?>" data-longitude="<?= $longitude ?>"></div>
            </div>


            <!-- CONTAINER RULES -->
            <div class="rules">
                <h4>Normes de la casa</h4>

                <p>Hora d'arribada: entre les <?= $entryTime ?> i les 21:00</p>
                <p>Sortir abans de les 12:00</p>
            </div>

            <!-- Modal de pantalla completa -->
            <div class="modal fade" id="modalReserva" tabindex="-1" aria-labelledby="modalReservaLabel" aria-hidden="true">
                <div class="modal-dialog modal-fullscreen">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalReservaLabel">Sol·licitud de reserva</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="group">
                                <div class="img">
                                    <img src="<?= $images[0] ?>" alt="<?= $name ?>">
                                </div>
                                <div class="info-container">
                                    <div class="text-container">
                                        <h1><?= $name ?></h1>
                                        <p>Figueres, Catalunya</p>
                                    </div>
                                </div>
                            </div>

                            <div class="dates-hosts">
                                <h4>Dates i Hostes</h4>
                                <div class="dates">
                                    <ul>
                                        <div class="text-container">
                                            <p>Dates</p>
                                        </div>
                                    </ul>
                                    <p class="right-aligned-content">
                                        <?php
                                        $dia = date('j', strtotime($dateEntry));
                                            $mes = $mesosCatala[date('n', strtotime($dateEntry))];

                                            echo $dia . " " . $mes;
                                        ?>
                                        <br>
                                        <?php
                                            $dia = date('j', strtotime($dateExit));
                                            $mes = $mesosCatala[date('n', strtotime($dateExit))];

                                            echo $dia . " " . $mes;
                                        ?>
                                    </p>
                                </div>

                                <div class="hosts">
                                    <ul>
                                        <div class="text-container">
                                            <p>Viatjers</p>
                                        </div>
                                    </ul>
                                    <p class="right-aligned-content">
                                        <?= $people ?> viatjers
                                    </p>
                                </div>
                            </div>


                            <div class="price">
                                <h4>Preu</h4>
                                <div class="info-price">
                                    <ul>
                                        <div class="text">
                                            <p>Preu per nit</p>
                                        </div>
                                    </ul>
                                    <p class="right-aligned-content number">€ <?= $pricePeakSeason ?></p>
                                </div>

                                <div class="nights">
                                    <ul>
                                        <div class="text">
                                            <p>Número de nits</p>
                                        </div>
                                    </ul>    
                                    <p class="right-aligned-content number">
                                        <?php
                                            // Canvia el format per mostrar-les
                                            $dateEntryFormatted = date('d/m/Y', strtotime($dateEntry));
                                            $dateExitFormatted = date('d/m/Y', strtotime($dateExit));

                                            // Les dues dates que vols comparar
                                            $data1 = new DateTime($dateEntry);
                                            $data2 = new DateTime($dateExit);

                                            // Calcula la diferencia en dies entre les dues dates
                                            $diferencia = $data1->diff($data2);

                                            $nombreNits = $diferencia->days;

                                            echo $nombreNits;
                                        ?>
                                    </p>
                                </div>

                                <div class="total">
                                    <ul>
                                        <div class="text">
                                            <p>Total</p>
                                        </div>
                                    </ul>
                                    <p class="right-aligned-content number">
                                        <?php
                                            $total = $pricePeakSeason * $nombreNits;
                                            
                                            // Afegeix .00
                                            echo number_format($total, 2);
                                        ?>
                                        €
                                    </p>
                                </div>

                            </div>

                            <div class="container-button">
                                <button type="button" class="btn btn-primary">Reserva</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Boto per obrir el modal -->
        <div class="position-fixed bottom-0 fix">
            <p><b>
                <?php
                    $total = $pricePeakSeason * $nombreNits;
                    // Add .00 at the final
                    echo number_format($total, 2);
                ?>€</b> per nit</p>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalReserva">Reserva</button>
        </div>


        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="../js/photos.js"></script>
        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
        <script src="../js/map.js"></script>

    </body>

    <?php require 'footer.php' ?>

</html>