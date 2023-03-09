function confirmarEliminar() {
    var x = confirm("Estas seguro de Eliminar?");
    if (x){
        return true;
    }
        
    else{
        return false;
    }
}

//Buscador con AJAX utilizando la API themovieDB
let api_key = 'api_key=ea1da4e62020cb544cbc4f3c8cdce851';
let ListaPeliculas;
let win = $(window);
let contpage = 1;
let img = 'https://image.tmdb.org/t/p/w500/'

function addPelicula(ListaPeliculas) {
    // La función recibe el elemento button y a partir de ahí se busca el div donde esta contenido por un ID para eliminarlo
      
    for (let i = 0; i < ListaPeliculas.results.length; i++) {
        console.log(ListaPeliculas.results[i]);
        console.log(ListaPeliculas.results[i].title);
        console.log(ListaPeliculas.results[i].poster_path);
        console.log(ListaPeliculas.results[i].release_date);
    
        $('#contenido').append('<div class="card col-lg-3 col-md-4 col-sm-6 col-xs-12 col-12 div_contenido" id="content_api" style="height: 420px; display: inline-flex;">\n' +
        '  <img class="card-img-top" style="height: 300px; width: 100%;" src="' + img + ListaPeliculas.results[i].poster_path + '" onerror="noCargada(this)">\n' +
        '  <div class="card-body">\n' +
        '    <a class="card-title">' + ListaPeliculas.results[i].title + '</a>\n' +
        '    <p class="card-text">Año: ' + ListaPeliculas.results[i].release_date + '</p>\n' +
        '</div>')
    };
    //El método Window.scroll() desplaza la ventana a un lugar particular en el documento.
    win.scroll(function () {
        if ($(document).height() - win.height() <= (win.scrollTop() + 80)) {
            contpage++;
            $.ajax({
                url: "https://api.themoviedb.org/3/search/movie?" + api_key + "&query=" + $('#pelicula').val() + "&type=movie&page=" + contpage ,
                success: function(denuevo) {
                    addPelicula(denuevo);
                }
            });
        }
    });

}
function searchPeli(){
    $.ajax({
    type: 'GET',
    url: "https://api.themoviedb.org/3/search/movie?" + api_key + "&query=" + $('#pelicula').val(),
    dataType: 'json',
    success: function(data) {
        ListaPeliculas = data;
        addPelicula(ListaPeliculas);
    },
    error: function (data) {
        console.log(data, "NO ha ido bien");
    }
  });
}

document.getElementById('buscar').addEventListener('click', function() {
    document.getElementById('contenido').innerHTML = '';
 });