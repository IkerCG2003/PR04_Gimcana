var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

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

// Función para calcular la distancia entre dos puntos en coordenadas geográficas
function calcularDistancia(lat1, lon1, lat2, lon2) {
    var R = 6371; // Radio de la Tierra en kilómetros
    var dLat = (lat2 - lat1) * Math.PI / 180;
    var dLon = (lon2 - lon1) * Math.PI / 180;
    var a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
        Math.cos(lat1 * Math.PI / 180) * Math.cos(lat2 * Math.PI / 180) *
        Math.sin(dLon / 2) * Math.sin(dLon / 2);
    var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
    var distancia = R * c * 1000; // Convertir a metros
    return distancia; // Distancia en metros
}

// Función para enviar la solicitud POST de forma asíncrona
function enviarSolicitudPost(url, data) {
    return fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken 
        },
        body: JSON.stringify(data)
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Error al realizar la solicitud.');
        }
        return response.json();
    })
    .catch(error => console.error('Error:', error));
}

// Función para agregar marcadores próximos al usuario
function agregarMarcadoresProximosUsuario(latitudUsuario, longitudUsuario, distanciaMaxima) {
    fetch('/obtenerCoordenadas')
        .then(response => response.json())
        .then(data => {
            data.forEach(marcador => {
                var distancia = calcularDistancia(latitudUsuario, longitudUsuario, marcador.latitud, marcador.longitud);
                // Verificar si la distancia al marcador es menor o igual a la distancia máxima
                if (distancia <= distanciaMaxima) {
                    var enFavoritos = marcador.enFavoritos; // Obtener el estado de favoritos del marcador
                    var buttonText = enFavoritos ? 'Quitar de favoritos' : 'Añadir a favoritos'; // Determinar el texto del botón
                    var marker = L.marker([marcador.latitud, marcador.longitud, marcador.id], { icon: icono }).addTo(map);
                    marker.on('click', function () {
                        var infoSitio = document.querySelector('.infoSitio');
                        // Actualizar el texto del botón según el estado de favoritos
                        var buttonText = enFavoritos ? 'Quitar de favoritos' : 'Añadir a favoritos';
                        infoSitio.innerHTML =
                            `
                            <h2>${marcador.nombre}</h2>
                            <p><span>Latitud:</span> ${marcador.latitud}</p>
                            <p><span>Longitud:</span> ${marcador.longitud}</p>
                            <p><span>ID del marcador:</span> ${marcador.id}</p> 
                            <form class="anadirFav" id="anadirFav" action="/anadirFav" method="POST">
                                <input type="hidden" name="_token" value="${csrfToken}"> 
                                <input type="hidden" name="id_sitio" value="${marcador.id}">
                                <button id="favButton" type="submit">${buttonText}</button>
                            </form>
                        `;
                        // Agregar un evento al botón para enviar la solicitud POST cuando se haga clic
                        var favButton = document.getElementById('favButton');
                        favButton.addEventListener('click', function (event) {
                            event.preventDefault(); // Evitar la acción predeterminada del formulario (recargar la página)
                            // Cambiar el texto del botón antes de enviar la solicitud
                            favButton.textContent = enFavoritos ? 'Añadiendo a favoritos...' : 'Quitando de favoritos...';
                            // Enviar la solicitud POST al servidor
                            enviarSolicitudPost('/anadirFav', { id_sitio: marcador.id })
                            .then(data => {
                                // Actualizar el texto del botón y el estado de enFavoritos después de recibir la respuesta del servidor
                                favButton.textContent = enFavoritos ? 'Quitar de favoritos' : 'Añadir a favoritos';
                                enFavoritos = !enFavoritos;
                                console.log(data.message); // Mostrar mensaje de éxito o error en la consola
                            });
                        });
                        console.log('Información del marcador:', marcador); // Agregar console.log con la información del marcador
                    });
                }
            });
        })
        .catch(error => console.error('Error al obtener coordenadas:', error));
}

// Función para añadir marcador y área de cercanía en ubicación actual del usuario
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

    // Llamar a la función para añadir marcadores próximos al usuario
    agregarMarcadoresProximosUsuario(latitud, longitud, 65); // Establecer el radio del área a 65 metros

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

// Llamar a la función para agregar el marcador y área de cercanía en la ubicación del usuario
agregarMarcadorUbicacionUsuario(41.34979245296962, 2.107716891526477);
