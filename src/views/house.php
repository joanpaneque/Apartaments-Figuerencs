<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/img/logo-transparent.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <link rel="stylesheet" href="/styles/house.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Casa</title>
</head>

<body>

    <?php 
        include("header.php");
    ?>


    <div class="container">

        <div class="info">

            <div class="image">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true" data-bs-interval="9999999">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="../assets/img/exterior.jpg" class="d-block w-100" alt="">
                        </div>
                        <div class="carousel-item">
                            <img src="../assets/img/interior.jpg" class="d-block w-100" alt="">
                        </div>
                        <div class="carousel-item">
                            <img src="../assets/img/pool.jpg" class="d-block w-100" alt="">
                        </div>
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
            </div>

            <div class="paragraph">
                <h1>El Far</h1>
                <h5>Figueres, Catalunya</h5>
                <h5 class="postal">17600</h5>
                <h6>5 dormitoris | 3 banys</h6>
            </div>
            
        </div>

        <div class="description">
            <h4>Descripció</h4>
            <p>
                Aquesta casa està situada a una petita ciutat de l'alt Empordà, Figueres.
                Conta de 5 dormitoris amb 3 banys, una piscina i espai suficient per tota una familia,
                És un espai força gran i moder, perfecte per disfrutar tant amb familia, com amb amics, com amb la parella.
            </p>
            <p>
                Aquest espai està en un terreny de 750 m².
            </p>
        </div>

        <div class="offers">
            <h4>Que ofereix?</h4>
            <ul>
                <li>Wifi</li>
                <li>Parking</li>
                <li>Cuina</li>
                <li>Vistes al mar</li>
            </ul>
        </div>

        <div class="map">
            <h4>Ubicació</h4>
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d5904.423561572273!2d2.964166499999993!3d42.27400240000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses!2ses!4v1697637104110!5m2!1ses!2ses"
                allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>

        <div class="rules">
            <h4>Normes de la casa</h4>

            <p>Hora d'arribada: entre les 16:00 i les 21:00</p>
            <p>Sortir abans de les 12:00</p>
        </div>


        <!-- Botó per obrir el modal -->
        <div class="position-fixed bottom-0 fix">
            <p><strong>€149</strong> per nit</p>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalReserva">Reserva</button>
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
                                <img src="../assets/img/exterior.jpg" alt="El Far">
                            </div>
                            <div class="info-container">
                                <div class="text-container">
                                    <h1>El Far</h1>
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
                                    18 Oct
                                    20 Oct
                                </p>
                            </div>

                            <div class="hosts">
                                <ul>
                                    <div class="text-container">
                                        <p>Viatjers</p>
                                    </div>
                                </ul>
                                <p class="right-aligned-content">
                                    2 Adults
                                    3 Nens
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
                                <p class="right-aligned-content number">€ 195</p>
                            </div>

                            <div class="nights">
                                <ul>
                                    <div class="text">
                                        <p>Número de nits</p>
                                    </div>
                                </ul>    
                                <p class="right-aligned-content number">3</p>
                            </div>

                            <div class="total">
                                <ul>
                                    <div class="text">
                                        <p>Total</p>
                                    </div>
                                </ul>
                                <p class="right-aligned-content number">€ 585</p>
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


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../assets/js/photos.js"></script>
</body>

</html>