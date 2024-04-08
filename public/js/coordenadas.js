var map = L.map('map').setView([41.350149243316864, 2.1072624638353137], 13);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);

var icono = L.Icon.extend({
    options: {
        iconSize:     [30, 40],
        shadowSize:   [75, 55],
        iconAnchor:   [20, 72],
        shadowAnchor: [4, 62],
        popupAnchor:  [-3, -76]
    }
});
var icono = new icono({iconUrl: './src/location-dot-solid.svg'});
 
// Cargar marcadores desde la base de datos
fetch('/obtenerCoordenadas')
    .then(response => response.json())
    .then(data => {
        data.forEach(marcador => {
            var marker = L.marker([marcador.latitud, marcador.longitud], {icon: icono}).addTo(map);
            marker.on('click', function() {
                var infoSitio = document.querySelector('.infoSitio');
                infoSitio.innerHTML = `<p>Nombre: ${marcador.nombre}</p><p>Latitud: ${marcador.latitud}</p><p>Longitud: ${marcador.longitud}</p>`;
            });
        });
    })
    .catch(error => console.error('Error al obtener coordenadas:', error));

// Evento para limpiar la información del sitio al hacer clic en cualquier parte del mapa
map.on('click', function () {
    var infoSitio = document.querySelector('.infoSitio');
    infoSitio.innerHTML = '';
});
