/*
4. Obtención de datos con parámetros
  -Cree una función para obtener la respuesta de https://api.github.com/search/repositories con los parámetros q = 'JavaScript'.
  -Muestre una lista de repositorios, proporcionada por el servicio, en el lado derecho de la pantalla.

  Pista: se debe utilizar ul para enumerar los repositorios.

  -Agregue una entrada con type="text" para realizar una búsqueda de cualquier valor.

  https://api.github.com/search/repositories?q={query}
*/
function getRepositorie() {
    var request = new XMLHttpRequest();
    var search = document.getElementById("git").value;
    request.open("GET", "https://api.github.com/search/repositories?q=" + search, true);
    request.onload = () => show_list(JSON.parse(request.responseText));
    console.log("consola" + request.responseText);
    request.send();
  }
  
  function show_list(repo) {
    var list = document.getElementsByClassName("list")[0];
    var ul = document.createElement("ul");
    console.log(`Hay un total de ${repo.total_count} repositorios`);
    for (var i in repo) {
        
        for (var k in repo.items) {
        console.log(repo.items[k].name);
        
        var li = document.createElement("li");
        var nameRepo = document.createTextNode(repo.items[k].name);
        
        li.appendChild(nameRepo);
        ul.appendChild(li);
        list.appendChild(ul);
        }
    }
    list.appendChild(ul);
}
