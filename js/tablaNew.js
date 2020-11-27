function edit(id) {
  document.querySelector("#input-id").value = id;
  document.querySelector("#btn-agregarRow").value = "Modificar Jugador";
  let jugadorid = "#jugador" + id;
  let filajugador = document.querySelector(jugadorid);

  let nombre = filajugador.querySelector(".nombre").innerHTML;
  console.log(nombre);

  mostrarForm();
}

document.querySelector("#filtro").addEventListener("change", filtrar);



document.querySelector("#inputCantMostrar").addEventListener("change", modificarURL);




function modificarURL(event) {
  window.location.href = "indoor/?pag=1&cant="+event.target.value; 
}


function filtrar() {
  let valor = document.querySelector("#filtro").value;
  for (let elem of document
    .querySelector(".tablaInfoEquipo")
    .querySelectorAll("tr")) {
    elem.className = "";
    let tdposicion = elem.querySelectorAll("td")[1];
    if (
      tdposicion != undefined &&
      valor != "all" &&
      tdposicion.innerHTML != valor
    ) {
      elem.className = "oculto";
    }
  }
}

function mostrarForm() {
  document.querySelector("#form-jugador").className = "";
}
