/*Manipulación del DOM
- Escriba una función que tome como entrada una matriz de datos y genere una estructura DOM que represente una tabla. Adjúntelo al cuerpo de una página determinada.

- Pista: usa los metodos document.createElement, document.createTextNode, y Node.appendChild.*/
let compras = ['pan', 'leche', 'queso', 'queso untable', 'pasta de mani'];

function generar_tabla(matriz) {
    var body = document.getElementsByTagName("main")[0];// Obtener la referencia del elemento body
    // Crea un elemento <table> y un elemento <tbody>
    var tabla   = document.createElement("table");
    var tblBody = document.createElement("tbody");

    long = matriz.length;
  
    // Crea las celdas
    for (var i = 0; i < long; i++) {
      // Crea las hileras de la tabla
      var hilera = document.createElement("tr");
      // Crea un elemento <td> y un nodo de texto, haz que el nodo de texto sea el contenido de <td>, ubica el elemento <td> al final de la hilera de la tabla
      var celda = document.createElement("td");
      var textoCelda = document.createTextNode(matriz[i]);
      celda.appendChild(textoCelda);
      hilera.appendChild(celda);
      
      // agrega la hilera al final de la tabla (al final del elemento tblbody)
      tblBody.appendChild(hilera);
    }
    // posiciona el <tbody> debajo del elemento <table>
    tabla.appendChild(tblBody);
    // appends <table> into <body>
    body.appendChild(tabla);
    // modifica el atributo "border" de la tabla y lo fija a "2";
    tabla.setAttribute("border", "2");
}
var btn = document.getElementById("btn"); // Encuentra el elemento "btn" en el sitio
btn.onclick = generar_tabla(compras); // Agrega función onclick al elemento


