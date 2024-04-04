var map = L.map('map').setView([41.36017809744229, 2.109403736829626], 13);

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 22,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);




// MARCADOR 1
var marker1 = L.marker([41.360327855916495, 2.098548486530989]).addTo(map);
marker1.on('click', function () {
    var infoSitio = document.querySelector('.infoSitio');
    infoSitio.innerHTML = "<h4 id='nombreSitio'>PATOS</h4><p>Información adicional sobre el sitio PATOS...</p><button id='eliminarInfo'>Eliminar información</button>";
    var btnEliminar = document.getElementById('eliminarInfo');
    btnEliminar.addEventListener('click', function () {
        infoSitio.innerHTML = '';
    });
});

// MARCADOR 2
var marker2 = L.marker([41.36017809744229, 2.109403736829626]).addTo(map);
marker2.on('click', function () {
    var infoSitio = document.querySelector('.infoSitio');
    infoSitio.innerHTML = "<h4>Lugar 2</h4><button>Como llegar <i class='fa-solid fa-diamond-turn-right'></i></button>";
    var btnEliminar = document.getElementById('eliminarInfo');
    btnEliminar.addEventListener('click', function () {
        infoSitio.innerHTML = '';
    });
});

// MARCADOR 3
var marker3 = L.marker([41.37229537033492, 2.109567301934585]).addTo(map);
marker3.on('click', function () {
    var infoSitio = document.querySelector('.infoSitio');
    infoSitio.innerHTML = "<h4>Lugar 3</h4><button>Como llegar <i class='fa-solid fa-diamond-turn-right'></i></button>";
    var btnEliminar = document.getElementById('eliminarInfo');
    btnEliminar.addEventListener('click', function () {
        infoSitio.innerHTML = '';
    });
});

// MARCADOR 3
var marker4 = L.marker([41.350149243316864, 2.1072624638353137]).addTo(map);
marker4.on('click', function () {
    var infoSitio = document.querySelector('.infoSitio');
    infoSitio.innerHTML = "<h4>Lugar 4</h4><button>Como llegar <i class='fa-solid fa-diamond-turn-right'></i></button>";
    var btnEliminar = document.getElementById('eliminarInfo');
    btnEliminar.addEventListener('click', function () {
        infoSitio.innerHTML = '';
    });
});

