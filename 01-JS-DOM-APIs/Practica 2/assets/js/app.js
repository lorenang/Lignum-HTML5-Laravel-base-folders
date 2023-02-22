// Eventos
// - Agregue un botón debajo de la section a su página de índice.

window.addEventListener('load', function() {
  setTimeout(() => {
    document.querySelector(".section-hidden").style.display = 'block';
    }, 500);
  ;
})

// - Cree una función que muestre un mensaje de alerta cuando se le llame.
function mostrarAlerta(evento) {
  alert("¡Usted llamo a la funcion mostrarAlerta()");
}

// - Adjunte un evento de clic al botón creado que llama a la función creada anteriormente.
var btn = document.getElementById("btn"); // Encuentra el elemento "btn" en el sitio
btn.onclick = mostrarAlerta; // Agrega función onclick al elemento


/*
escuchar los posibles eventos de animación. Este código configura nuestros detectores de eventos
(event listeners); los llamamos cuando el documento carga por primera vez para configurar todo.
  var e = document.querySelector(".section-hidden");
  e.addEventListener("animationstart", listener, false);
  e.addEventListener("animationend", listener, false);
  e.className = "fadein";
*/



