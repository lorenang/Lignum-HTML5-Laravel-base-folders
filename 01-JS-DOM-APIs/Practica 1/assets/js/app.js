//Cuando la página termine de cargarse, la section debe aparecer gradualmente (fade in).

window.addEventListener('load', function() {
  setTimeout(() => {
    document.querySelector(".section-hidden").style.display = 'block';
    }, 500);
  ;
})

/*
 escuchar los posibles eventos de animación. Este código configura nuestros detectores de eventos
 (event listeners); los llamamos cuando el documento carga por primera vez para configurar todo.

var e = document.querySelector(".section-hidden");
e.addEventListener("animationstart", listener, false);
e.addEventListener("animationend", listener, false);
e.className = "fadein";

*/