//JAVASCRIPT
(function() {
    "use strict";

    document.addEventListener('DOMContentLoaded', function(){
        
        // Section Map
        var map = L.map('mapa').setView([39.467554, -0.375732], 14);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);
        
        L.marker([39.467554, -0.375732]).addTo(map)
            .bindTooltip('VLCWebCamp')
            .openTooltip();
    }); 
})();
 
// JQUERY
$(function() {

    // Programa de Conferencias
    $('.programa-evento .info-curso:first').show();
    $('.menu-programa a:first').addClass('activo');

    $('.menu-programa a').on('click', function() {
        $('.ocultar').hide();
        
        $('.menu-programa a').removeClass('activo');
        $(this).addClass('activo');
        
        var enlace = $(this).attr('href');
        $(enlace).fadeIn(1000);

        return false;
    });

    // Animaciones para los números
    $('.resumen-evento li:nth-child(1) p').animateNumber({ number: 6}, 1200);
    $('.resumen-evento li:nth-child(2) p').animateNumber({ number: 15}, 1200);
    $('.resumen-evento li:nth-child(3) p').animateNumber({ number: 3}, 1500);
    $('.resumen-evento li:nth-child(4) p').animateNumber({ number: 9}, 1500);

    // Animacion para el contador
    $('.cuenta-regresiva').countdown('2019/12/10 09:00:00', function(event){
        $('#dias').html(event.strftime('%D'));
        $('#horas').html(event.strftime('%H'));
        $('#minutos').html(event.strftime('%M'));
        $('#segundos').html(event.strftime('%S'));
    });

});