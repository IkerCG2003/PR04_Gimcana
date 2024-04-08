var map = L.map('map').setView([41.350149243316864, 2.1072624638353137], 13);

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

// // MARCADOR 1
// var marker1 = L.marker([41.360327855916495, 2.098548486530989], { icon: icono }).addTo(map);
// marker1.on('click', function () {
//     var infoSitio = document.querySelector('.infoSitio');
//     var contenidoHTML = "";
//     contenidoHTML += `
//     @foreach ($sitios as $sitio)
    
//             <div class="sitioMapaInfo">
//                 <h4>{{ $sitio->nom_sitio }}</h4>
//                 <p>{{ $sitio->ubi_sitio }}</p>
        
//                 @if ($sitio->id === $etiquetasitio->sitioRel->id)
//                     <div class="etiquetasSitios">
//                         @foreach ($etiquetassitios as $etiquetasitio)
//                             <p>{{ $etiquetasitio->etiquetaRel->nom_etiqueta }}</p>
//                         @endforeach
//                     </div>
//                 @endif
        
//                 <div class="botonesSitios">
//                     <button><i class="fa-solid fa-diamond-turn-right"></i> Como llegar</button>
//                     <button><i class="fa-solid fa-circle-info"></i> Mas info</button>
//                 </div>
//             </div>
//     @endforeach
//     `;
//     infoSitio.innerHTML = contenidoHTML;

//     var btnEliminar = document.getElementById('eliminarInfo');
//     btnEliminar.addEventListener('click', function () {
//         infoSitio.innerHTML = '';
//     });
// });

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

// MARCADOR 4
var marker4 = L.marker([41.350149243316864, 2.1072624638353137], {icon: icono}).addTo(map);
marker4.on('click', function () {
    var infoSitio = document.querySelector('.infoSitio');
    infoSitio.innerHTML = "<h4 id='nombreSitio'>Lugar 4</h4><p>Información adicional sobre el sitio lugar 4</p><button id='eliminarInfo'>Eliminar información</button>";
    var btnEliminar = document.getElementById('eliminarInfo');
    btnEliminar.addEventListener('click', function () {
        infoSitio.innerHTML = '';
    });
});





// // Supongamos que tienes una función para obtener las coordenadas desde tu base de datos
// function obtenerCoordenadasDesdeBaseDeDatos() {
//     // Realiza una solicitud AJAX para obtener las coordenadas desde tu backend
//     // Aquí asumimos que la respuesta es un arreglo de objetos con propiedades latitud, longitud y nombre
//     fetch('/obtener-coordenadas')
//         .then(response => response.json())
//         .then(coordenadas => {
//             // Llama a la función para crear marcadores con las coordenadas obtenidas
//             crearMarcadores(coordenadas);
//         })
//         .catch(error => console.error('Error al obtener coordenadas:', error));
// }

// // Función para crear marcadores a partir de coordenadas
// function crearMarcadores(coordenadas) {
//     coordenadas.forEach(coordenada => {
//         var marker = L.marker([coordenada.latitud, coordenada.longitud]).addTo(map);
//         marker.on('click', function () {
//             var infoSitio = document.querySelector('.infoSitio');
//             infoSitio.innerHTML = `<h4>${coordenada.nombre}</h4><button>Como llegar <i class='fa-solid fa-diamond-turn-right'></i></button>`;
//             var btnEliminar = document.getElementById('eliminarInfo');
//             btnEliminar.addEventListener('click', function () {
//                 infoSitio.innerHTML = '';
//             });
//         });
//     });
// }

// // Llama a la función para obtener las coordenadas desde la base de datos
// obtenerCoordenadasDesdeBaseDeDatos();
