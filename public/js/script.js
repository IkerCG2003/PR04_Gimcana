var map = L.map('map').setView([41.36123996185425, 2.1034443534699343], 15);

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);





// ICONO graffiti
var graffitiIcon = L.Icon.extend({
    options: {
        shadowUrl: './src/UBI-SOMBRA.png',
        iconSize:     [45, 63],
        shadowSize:   [75, 55],
        iconAnchor:   [20, 72],
        shadowAnchor: [4, 62],
        popupAnchor:  [-3, -76]
    }
});
var graffitiIcono = new graffitiIcon({iconUrl: './src/graffiti-ICO.png'});





// MARCADORES CON POPUPS
var marker1 = L.marker([41.360327855916495, 2.098548486530989], {icon: graffitiIcono}).addTo(map);
marker1.bindPopup("<img class='imgpopups' src='./src/graffiti-1.jpeg' alt='graffiti1'><div class='popups'><h4>PATOS</h4><button>Como llegar <i class='fa-solid fa-diamond-turn-right'></i></button></div>");

var marker2 = L.marker([41.35937023648218, 2.107425023087614], {icon: graffitiIcono}).addTo(map);
marker2.bindPopup("<img class='imgpopups' src='./src/graffiti-2.jpeg' alt='graffiti2'><div class='popups'><h4>JOA6</h4><button>Como llegar <i class='fa-solid fa-diamond-turn-right'></i></button></div>");

var marker3 = L.marker([41.358647885603, 2.1082984930794124], {icon: graffitiIcono}).addTo(map);
marker3.bindPopup("<img class='imgpopups' src='./src/graffiti-3.jpg' alt='graffiti3'><div class='popups'><h4>JOA</h4><button>Como llegar <i class='fa-solid fa-diamond-turn-right'></i></button></div>");

var marker4 = L.marker([41.36326710730101, 2.099983184247681], {icon: graffitiIcono}).addTo(map);
marker4.bindPopup("<img class='imgpopups' src='./src/graffiti-4.jpg' alt='graffiti4'><div class='popups'><h4>JOA</h4><button>Como llegar <i class='fa-solid fa-diamond-turn-right'></i></button></div>");

var marker5 = L.marker([41.35881757360296, 2.10545289960949], {icon: graffitiIcono}).addTo(map);
marker5.bindPopup("<img class='imgpopups' src='./src/graffiti-5.jpg' alt='graffiti5'><div class='popups'><h4>JOA</h4><button>Como llegar <i class='fa-solid fa-diamond-turn-right'></i></button></div>");






var rutasActivas = [];

document.getElementById('comollegar1').addEventListener('click', function () {
    rutasActivas.forEach(function (ruta) {
        map.removeControl(ruta);
    });
    rutasActivas = [];
    var browserLat;
    var browserLong;
    navigator.geolocation.getCurrentPosition(function (position) {
        browserLat = position.coords.latitude;
        browserLong = position.coords.longitude;
        map.setView([41.360327855916495, 2.098548486530989], 14);

        var ruta1 = L.Routing.control({
            waypoints: [
                L.latLng(browserLat, browserLong),
                L.latLng(41.360327855916495, 2.098548486530989)],
            routeWhileDragging: true,
            createMarker: function (i, waypoint, n) {
                var iconUrl;
                if (i === 0) {
                    iconUrl = './src/USUARIO-ICO.png';
                } else if (i === n - 1) {
                    iconUrl = './src/NADA.png';
                }
                var icon = L.icon({
                    iconUrl: iconUrl,
                    iconSize: [45, 63],
                    iconAnchor: [20, 72],
                    html: "<img src='./src/GRAFFITI-1.jpg' alt='graffiti1' class='imgpopups'>"
                });
                return L.marker(waypoint.latLng, {
                    draggable: true,
                    icon: icon
                });
            }
        }).addTo(map);
        rutasActivas.push(ruta1);
    });
});

document.getElementById('comollegar2').addEventListener('click', function () {
    rutasActivas.forEach(function (ruta) {
        map.removeControl(ruta);
    });
    rutasActivas = [];
    var browserLat;
    var browserLong;
    navigator.geolocation.getCurrentPosition(function (position) {
        browserLat = position.coords.latitude;
        browserLong = position.coords.longitude;
        map.setView([41.35937023648218, 2.107425023087614], 14);

        // RUTA 2
        var ruta2 = L.Routing.control({
            waypoints: [
                L.latLng(browserLat, browserLong),
                L.latLng(41.35937023648218, 2.107425023087614)
            ],
            routeWhileDragging: true,
            createMarker: function (i, waypoint, n) {
                var iconUrl;
                if (i === 0) {
                    iconUrl = './src/USUARIO-ICO.png';
                } else if (i === n - 1) {
                    iconUrl = './src/NADA.png';
                }
                var icon = L.icon({
                    iconUrl: iconUrl,
                    iconSize: [45, 63],
                    iconAnchor: [20, 72],
                    html: "<img src='./src/GRAFFITI-1.jpg' alt='graffiti2' class='imgpopups'>"
                });
                return L.marker(waypoint.latLng, {
                    draggable: true,
                    icon: icon
                });
            }
        }).addTo(map);
        rutasActivas.push(ruta2);
    });
});

document.getElementById('comollegar3').addEventListener('click', function () {
    rutasActivas.forEach(function (ruta) {
        map.removeControl(ruta);
    });
    rutasActivas = [];
    var browserLat;
    var browserLong;
    navigator.geolocation.getCurrentPosition(function (position) {
        browserLat = position.coords.latitude;
        browserLong = position.coords.longitude;
        map.setView([41.358647885603, 2.1082984930794124], 14);

        // RUTA 3
        var ruta3 = L.Routing.control({
            waypoints: [
                L.latLng(browserLat, browserLong),
                L.latLng(41.358647885603, 2.1082984930794124)
            ],
            routeWhileDragging: true,
            createMarker: function (i, waypoint, n) {
                var iconUrl;
                if (i === 0) {
                    iconUrl = './src/USUARIO-ICO.png';
                } else if (i === n - 1) {
                    iconUrl = './src/NADA.png';
                }
                var icon = L.icon({
                    iconUrl: iconUrl,
                    iconSize: [45, 63],
                    iconAnchor: [20, 72],
                    html: "<img src='./src/GRAFFITI-1.jpg' alt='graffiti3' class='imgpopups'>"
                });
                return L.marker(waypoint.latLng, {
                    draggable: true,
                    icon: icon
                });
            }
        }).addTo(map);
        rutasActivas.push(ruta3);
    });
});

document.getElementById('comollegar4').addEventListener('click', function () {
    rutasActivas.forEach(function (ruta) {
        map.removeControl(ruta);
    });
    rutasActivas = [];
    var browserLat;
    var browserLong;
    navigator.geolocation.getCurrentPosition(function (position) {
        browserLat = position.coords.latitude;
        browserLong = position.coords.longitude;
        map.setView([41.36326710730101, 2.099983184247681], 14);

        // RUTA 4
        var ruta4 = L.Routing.control({
            waypoints: [
                L.latLng(browserLat, browserLong),
                L.latLng(41.36326710730101, 2.099983184247681)],
            routeWhileDragging: true,
            createMarker: function (i, waypoint, n) {
                var iconUrl;
                if (i === 0) {
                    iconUrl = './src/USUARIO-ICO.png';
                } else if (i === n - 1) {
                    iconUrl = './src/NADA.png';
                }
                var icon = L.icon({
                    iconUrl: iconUrl,
                    iconSize: [45, 63],
                    iconAnchor: [20, 72],
                    html: "<img src='./src/GRAFFITI-1.jpg' alt='graffiti4' class='imgpopups'>"
                });
                return L.marker(waypoint.latLng, {
                    draggable: true,
                    icon: icon
                });
            }
        }).addTo(map);
        rutasActivas.push(ruta4);
    });
});

document.getElementById('comollegar5').addEventListener('click', function () {
    rutasActivas.forEach(function (ruta) {
        map.removeControl(ruta);
    });
    rutasActivas = [];
    var browserLat;
    var browserLong;
    navigator.geolocation.getCurrentPosition(function (position) {
        browserLat = position.coords.latitude;
        browserLong = position.coords.longitude;
        map.setView([41.35881757360296, 2.10545289960949], 14);

        // RUTA 5
        var ruta5 = L.Routing.control({
            waypoints: [
                L.latLng(browserLat, browserLong),
                L.latLng(41.35881757360296, 2.10545289960949)
            ],
            routeWhileDragging: true,
            createMarker: function (i, waypoint, n) {
                var iconUrl;
                if (i === 0) {
                    iconUrl = './src/USUARIO-ICO.png';
                } else if (i === n - 1) {
                    iconUrl = './src/NADA.png';
                }
                var icon = L.icon({
                    iconUrl: iconUrl,
                    iconSize: [45, 63],
                    iconAnchor: [20, 72],
                    html: "<img src='./src/GRAFFITI-1.jpg' alt='graffiti5' class='imgpopups'>"
                });
                return L.marker(waypoint.latLng, {
                    draggable: true,
                    icon: icon
                });
            }
        }).addTo(map);
        rutasActivas.push(ruta5);
    });
});






// MOSTRAR Y ESCONDER PUPUPS
marker1.on('click', function () {
    marker1.openPopup();
});
marker2.on('click', function () {
    marker2.openPopup();
});
marker3.on('click', function () {
    marker3.openPopup();
});
marker4.on('click', function () {
    marker4.openPopup();
});
marker5.on('click', function () {
    marker5.openPopup();
});
