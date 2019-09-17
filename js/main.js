(function() {
    "use strict";

    document.addEventListener('DOMContentLoaded', function(){
        var map = L.map('mapa').setView([39.467554, -0.375732], 14);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);
        
        L.marker([39.467554, -0.375732]).addTo(map)
            .bindTooltip('VLCWebCamp')
            .openTooltip();
    }); 
})();