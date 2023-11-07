// Id a les imatges 
$('.carousel-item img').addClass('img-enlargable');

// Controlador esdeveniments per a les imatges ampliables
$('.img-enlargable').click(function() {
    var src = $(this).attr('src');

    // Crea un div per a la visualització de la imatge ampliada
    var enlargedImage = $('<div>').css({
        background: 'RGBA(0,0,0,.5) url(' + src + ') no-repeat center',
        backgroundSize: 'contain',
        width: '100%',
        height: '100%',
        position: 'fixed',
        zIndex: '10000',
        top: '0',
        left: '0',
        cursor: 'zoom-out'
    });

    // Controlador esdeveniments per tancar la imatge ampliada
    enlargedImage.click(function() {
        $(this).remove();
    });

    // Afegim el div creat anteriorment
    $('body').append(enlargedImage);
});
