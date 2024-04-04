var map = L.map('map').setView([41.36017809744229, 2.109403736829626], 13);

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);



// ICONO graffiti
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




// MARCADOR 1
var marker1 = L.marker([41.360327855916495, 2.098548486530989], {icon: icono}).addTo(map);
marker1.on('click', function () {
    var infoSitio = document.querySelector('.infoSitio');
    infoSitio.innerHTML = "<h4 id='nombreSitio'>Lugar 1</h4><p>Información adicional sobre el sitio lugar 1</p><button id='eliminarInfo'>Eliminar información</button>";
    var btnEliminar = document.getElementById('eliminarInfo');
    btnEliminar.addEventListener('click', function () {
        infoSitio.innerHTML = '';
    });
});

// MARCADOR 2
var marker2 = L.marker([41.36017809744229, 2.109403736829626], {icon: icono}).addTo(map);
marker2.on('click', function () {
    var infoSitio = document.querySelector('.infoSitio');
    infoSitio.innerHTML = "<h4 id='nombreSitio'>Lugar 2</h4><p>Información adicional sobre el sitio lugar 2</p><button id='eliminarInfo'>Eliminar información</button>";
    var btnEliminar = document.getElementById('eliminarInfo');
    btnEliminar.addEventListener('click', function () {
        infoSitio.innerHTML = '';
    });
});

// MARCADOR 3
var marker3 = L.marker([41.37229537033492, 2.109567301934585], {icon: icono}).addTo(map);
marker3.on('click', function () {
    var infoSitio = document.querySelector('.infoSitio');
    infoSitio.innerHTML = "<h4 id='nombreSitio'>Lugar 3</h4><p>Información adicional sobre el sitio lugar 3</p><button id='eliminarInfo'>Eliminar información</button>";
    var btnEliminar = document.getElementById('eliminarInfo');
    btnEliminar.addEventListener('click', function () {
        infoSitio.innerHTML = '';
    });
});

// MARCADOR 3
var marker4 = L.marker([41.350149243316864, 2.1072624638353137], {icon: icono}).addTo(map);
marker4.on('click', function () {
    var infoSitio = document.querySelector('.infoSitio');
    infoSitio.innerHTML = "<h4 id='nombreSitio'>Lugar 4</h4><p>Información adicional sobre el sitio lugar 4</p><button id='eliminarInfo'>Eliminar información</button>";
    var btnEliminar = document.getElementById('eliminarInfo');
    btnEliminar.addEventListener('click', function () {
        infoSitio.innerHTML = '';
    });
});

