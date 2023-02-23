//- Obtención de datos
//       -Cree una función para obtener la respuesta de http://api.icndb.com/jokes/random.
//       -Reemplace el evento de clic del botón con esta nueva función.
//       -Escriba la respuesta dentro del elemento de la section.
//       
//       -Si ocurre un error del servidor, el contenido de la section debe ponerse rojo.
var msg;
var resp = document.getElementById("respuestaHTTP");
var info = document.getElementById("textResp");

function obtenerDatos(evento) {
  //Crear XMLHttpRequest:
  const http = new XMLHttpRequest();
  //Inicializo
  http.open('GET', 'https://api.chucknorris.io/');
  //open no abre la conexión. Solo configura la solicitud. La actividad de la red solo comienza con la llamada de send.
  http.send();
    //load: Se activa cuando una XMLHttpRequesttransacción se completa con éxito. También disponible a través de la propiedad onload del controlador de eventos.
  http.onreadystatechange = (e) => {
    console.log(http.responseText);
    console.log(http.response)
  }
  http.onload = function() {
    if (http.status != 200) { 
    /*El estado de la respuesta al pedido. status es 200 por un pedido exitoso). Sólo de lectura.
    El código de estado HTTP (un número): 200, 404, 403 y así sucesivamente, puede ser 0 en caso de una falla que no sea HTTP.*/
      msg = `Error ${http.status}: ${req.statusText}`;
      resp.innerHTML = msg;
      alert(msg); // ej. 404: Not Found
    } else { // muestro el resultado
      msg = `Hecho, consiguio ${http.response.length} bytes`;
      //response: Contenido parseado automáticamente basado en .responseType.
      resp.innerHTML = msg;
      alert(msg); // response: es la respuesta del servidor
    }
  };
  //progress: Se activa periódicamente cuando una solicitud recibe más datos. También disponible a través de la propiedad onprogress del controlador de eventos.
  http.onprogress = function(event) {
    if (event.lengthComputable) {
      msg = `Recibidos ${event.loaded} de ${event.total} bytes`;
      resp.innerHTML = msg;
      alert(msg);
    } else {
      msg = `Recibidos ${event.loaded} bytes`;
      resp.innerHTML = msg;
      alert(msg); 
    }
  };
  //error:Se activa cuando la solicitud encuentra un error. También disponible a través de la onerrorpropiedad del controlador de eventos.
  http.onerror = function() {
    document.querySelector(".container").style.background = "red";
    //document.querySelector(".container").style.color = "red";
    msg = "Su solicitud falló";
    resp.innerHTML = msg;
    alert(msg);
  };
}

var btn = document.getElementById("btn"); // Encuentra el elemento "btn" en el sitio
btn.onclick = obtenerDatos; // Agrega función onclick al elemento

//-Crear una función reutilizable para realizar llamadas AJAX. Esta función debe aceptar un objeto de configuración y devolver una promesa ES6.
const llamadaAJAX = (url, method) => {
    return new Promise((resolve, reject) => {
      const http = new XMLHttpRequest();
      //onreadystatechange almacena el nombre de la función que se ejecutará cuando el objeto XMLHttpRequest cambie de estado.
      http.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200) {
          /*readyState Almacena el estado del requerimiento hecho al servidor, pudiendo ser:
          0 No inicializado (el método open no a sido llamado)
          1 Cargando (se llamó al método open)
          2 Cargado (se llamó al método send y ya tenemos la cabecera de la petición HTTP y el status)
          3 Interactivo (la propiedad responseText tiene datos parciales)
          4 Completado (la propiedad responseText tiene todos los datos pedidos al servidor)*/
          resolve(
            console.log(this.responseText),
            document.getElementById("textResp2").innerHTML = this.responseText);
        } else {
          reject (
            document.getElementById("textResp2").innerHTML = `Error ${http.status}: ${req.statusText}`
          )
        }
      }
    http.open(method, url);
    http.send();  
    /*
    Una vez completada la comunicación, responseText contiene la respuesta del servidor en forma de cadena de texto.
    responseText del objeto XMLHttpRequest almacena el valor devuelto por el servidor. Normalmente accederemos a la propiedad responseText cuando el objeto XMLHttpRequest nos informa que toda la información fue remitida por el servidor, esto ocurre cuando la propiedad readyState del objeto XMLHttpRequest almacena el valor 4.*/
  }
)}

window.addEventListener('load', 
  function() { 
    llamadaAJAX('https://api.chucknorris.io/', 'GET');
  }, false);

/*
document.addEventListener('load', 
  function() {
    llamadaAJAX('https://api.chucknorris.io/', 'GET');
  } false);

document.getElementById("btn2").addEventListener("click", function(){
  llamadaAJAX('https://api.chucknorris.io/', 'GET');
})
*/
