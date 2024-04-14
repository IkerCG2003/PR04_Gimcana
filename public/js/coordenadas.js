var map = L.map('map').setView([41.350149243316864, 2.1072624638353137], 13);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);

// Obtener la ubicación del usuario
navigator.geolocation.getCurrentPosition(function (position) {
    var userLat = position.coords.latitude;
    var userLng = position.coords.longitude;

    // Crear marcador para la ubicación del usuario
    var userMarker = L.marker([userLat, userLng]).addTo(map);
}, function (error) {
    console.error('Error al obtener la ubicación del usuario:', error);
});

fetch('/obtenerCoordenadas')
    .then(response => response.json())
    .then(data => {
        data.forEach(marcador => {
            var iconoUrl = '/src/' + marcador.ico_sitio + '.png';

            var iconoMarcador = L.icon({
                iconUrl: iconoUrl,
                iconSize: [30, 40],
                shadowSize: [75, 55],
                iconAnchor: [20, 72],
                shadowAnchor: [4, 62],
                popupAnchor: [-3, -76]
            });

            var marker = L.marker([marcador.latitud, marcador.longitud], { icon: iconoMarcador }).addTo(map);
            marker.on('click', function () {
                var infoSitio = document.querySelector('.infoSitio');
                infoSitio.innerHTML = `<div class="sitioMapaInfo"><h4>Nombre: ${marcador.nombre}</h4><p>Latitud: ${marcador.latitud}</p><p>Longitud: ${marcador.longitud}</p></div>`;
            });
        });
    })
    .catch(error => console.error('Error al obtener coordenadas:', error));

map.on('click', function () {
    var infoSitio = document.querySelector('.infoSitio');
    infoSitio.innerHTML = '';
});

function filtrar(e) {
    e.preventDefault();
    let id = e.target[1].value;

    var formdata = new FormData();
    formdata.append('id', id);
    var csrfToken = document.querySelector('meta[name="csrf_token"]').getAttribute('content');
    formdata.append('_token', csrfToken);

    var ajax = new XMLHttpRequest();

    ajax.open('post', '/obtenerCoordenadasfiltro');

    ajax.onload = function () {

        if (ajax.status == 200) {
            // console.log(this.responseText); Comprobar que lleva la respues de listar.php
            var json = JSON.parse(ajax.responseText);
            // Eliminar iconos
            map.eachLayer(function (layer) {
                if (layer instanceof L.Marker) {
                    map.removeLayer(layer);
                }
            });
            // Mostrar nuevos icono
            json.forEach(marcador => {
                var iconoUrl = '/src/' + marcador.ico_sitio + '.png';

                var iconoMarcador = L.icon({
                    iconUrl: iconoUrl,
                    iconSize: [30, 40],
                    shadowSize: [75, 55],
                    iconAnchor: [20, 72],
                    shadowAnchor: [4, 62],
                    popupAnchor: [-3, -76]
                });

                var marker = L.marker([marcador.latitud, marcador.longitud], { icon: iconoMarcador }).addTo(map);
                marker.on('click', function () {
                    var infoSitio = document.querySelector('.infoSitio');
                    infoSitio.innerHTML = `<div class="sitioMapaInfo"><h4>Nombre: ${marcador.nombre}</h4><p>Latitud: ${marcador.latitud}</p><p>Longitud: ${marcador.longitud}</p></div>`;
                });
            });
        }
    }

    ajax.send(formdata);
}
