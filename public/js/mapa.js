
var map = L.map('map').setView([41.350149243316864, 2.1072624638353137], 16);

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

map.locate({ setView: true, maxZoom: 16 })

function onLocationFound(e) {
    var radio = e.accuary / 3;
    L.marker(e.latlng).addTo(map), bindPopup("Estas aqui, con " + radio + " metros de aproximadamente").openPopup();
    l.circle(e.latlng.radio).addTo(map);
}

var marker1 = L.marker([41.360327855916495, 2.098548486530989], { icon: icono }).addTo(map);
