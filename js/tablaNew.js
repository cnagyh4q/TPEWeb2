

   function edit(id){
    document.querySelector("#input-id").value=id;  
    document.querySelector("#btn-agregarRow").value='Modificar Jugador';
    //falta tomar los datos de la fila
    let jugadorid = "#jugador"+id;
    let filajugador=document.querySelector(jugadorid);

    let nombre = filajugador.querySelector(".nombre").innerHTML;
    console.log(nombre);

    mostrarForm();    
}    

function mostrarForm (){
  document.querySelector("#form-jugador").className ="";
}

document.addEventListener("DOMContentLoaded", cargarPagina);

function cargarPagina() {

  document.querySelector("#btn-agregarJugador").addEventListener("click", ()=>{
      document.querySelector("#input-id").value='';
      document.querySelector("#btn-agregarRow").value='Agregar Jugador'; 
      console.log("paso JS");
      mostrarForm();
  });

  

  function agregarJugador (){
      let form = document.querySelector("#form-jugador");
      form.action="agregar";        
      form.submit();
      
  }

  function modificarJugador(){
      let form = document.querySelector("#form-jugador");
      form.action="modificarjugador";        
      form.submit();
      
  }

  /*
 document.querySelector("#form-jugador").addEventListener("submit", (event) => {
      event.preventDefault();
      if (document.querySelector("#input-id").value != null && document.querySelector("#input-id").value != ''){
          modificarJugador();
      }
      else{agregarJugador();}
  });
*/
}