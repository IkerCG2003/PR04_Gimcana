var map = L.map('map').setView([41.36123996185425, 2.1034443534699343], 15);

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);


// MARCADORES CON POPUPS
var marker1 = L.marker([41.360327855916495, 2.098548486530989], {icon: graffitiIcono}).addTo(map);
marker1.bindPopup("<div class='popups'><h4>PATOS</h4><button>Como llegar <i class='fa-solid fa-diamond-turn-right'></i></button></div>");
