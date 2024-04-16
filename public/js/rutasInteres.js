var map = L.map('map').setView([41.34979245296962, 2.107716891526477], 17);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);

var icono = L.Icon.extend({
    options: {
        iconSize: [30, 40],
        shadowSize: [75, 55],
        iconAnchor: [20, 72],
        shadowAnchor: [4, 62],
        popupAnchor: [-3, -76]
    }
});
var icono = new icono({ iconUrl: './src/location-dot-solid.svg' });

// Función para agregar marcadores próximos al usuario
function agregarMarcadores(latitudUsuario, longitudUsuario, distanciaMaxima) {
    fetch('/obtenerCoordenadas')
        .then(response => response.json())
        .then(data => {
            data.forEach(marcador => {
                var marker = L.marker([marcador.latitud, marcador.longitud, marcador.id], { icon: icono }).addTo(map);
                marker.on('click', function () {
                    var infoSitio = document.querySelector('.infoSitio');
                    infoSitio.innerHTML =
                        `
                            <h6>${marcador.nom_sitio}</h6>
                            <p>${marcador.descripcion}</p>
                            <img src="./img/sitios/${marcador.nom_sitio}.jpg" class="imagen_sitio" alt="Imagen del sitio">                           
                        `;
                    console.log('Información del marcador:', marcador); // Agregar console.log con la información del marcador
                });
            });
        })
        .catch(error => console.error('Error al obtener coordenadas:', error));
}

// Función para agregar marcador y área de cercanía en ubicación actual del usuario
function agregarMarcadorUbicacionUsuario(latitud, longitud) {
    // Agregar marcador en la ubicación del usuario
    var marcadorUsuario = L.marker([latitud, longitud], { draggable: true }).addTo(map);

    // Agregar área de cercanía alrededor de la ubicación del usuario
    var circle = L.circle([latitud, longitud], {
        color: 'blue',
        fillColor: 'blue',
        fillOpacity: 0.1,
        radius: 65 // Radio en metros
    }).addTo(map);

    // Llamar a la función para añadir marcadores 
    agregarMarcadores(latitud, longitud, 65); // Establecer el radio del área a 65 metros

    // Evento para actualizar la posición del marcador de la ubicación del usuario al arrastrarlo
    marcadorUsuario.on('dragend', function (event) {        
        var marker = event.target;
        var position = marker.getLatLng();
        var latitud = position.lat;
        var longitud = position.lng;

        // Limpiar los marcadores y el área previamente agregados
        map.eachLayer(function (layer) {
            if (layer instanceof L.Marker || layer instanceof L.Circle) {
                map.removeLayer(layer);
            }
        });

        // Agregar nuevamente el marcador y el área con la nueva posición
        agregarMarcadorUbicacionUsuario(latitud, longitud);
    });
}

// Función para obtener la ubicación actual del usuario
function obtenerUbicacionUsuario() {
    return new Promise((resolve, reject) => {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(resolve, reject);
        } else {
            reject(new Error('La geolocalización no está disponible en este navegador.'));
        }
    });
}

// Llamar a la función para obtener la ubicación del usuario
obtenerUbicacionUsuario()
    .then((position) => {
        // Extraer la latitud y longitud de la posición obtenida
        const latitud = position.coords.latitude;
        const longitud = position.coords.longitude;

        // Llamar a la función para agregar el marcador y área de cercanía en la ubicación del usuario
        agregarMarcadorUbicacionUsuario(latitud, longitud);
    })
    .catch((error) => {
        console.error('Error al obtener la ubicación del usuario:', error);
    });

// Función para mostrar popup con latitud y longitud al hacer clic en el mapa
function mostrarPopupCoordenadas(e) {
    var latitud = e.latlng.lat.toFixed(6); // Obtener la latitud del evento de clic en el mapa y redondear a 6 decimales
    var longitud = e.latlng.lng.toFixed(6); // Obtener la longitud del evento de clic en el mapa y redondear a 6 decimales
    L.popup()
        .setLatLng(e.latlng)
        .setContent(`Latitud: ${latitud}<br>Longitud: ${longitud}`)
        .openOn(map);
}

// Agregar evento de clic al mapa para mostrar el popup con latitud y longitud
map.on('click', mostrarPopupCoordenadas);


