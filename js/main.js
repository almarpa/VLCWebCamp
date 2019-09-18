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
});