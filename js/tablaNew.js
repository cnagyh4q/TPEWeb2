document.addEventListener("DOMContentLoaded", cargarPagina);

function cargarPagina() {

    document.querySelector("#btn-agregarJugador").addEventListener("click", mostrarForm);

    function mostrarForm (){
        document.querySelector("#form-jugador").className ="";
        
    }

    //document.querySelector("#edit").addEventListener("click", editarElemento);

    var editar = document.getElementById("edit7");
    editar.addEventListener("click", editarJugador);

    var delet = document.getElementById("delet11");
    delet.addEventListener("click", eliminarJugador);

    
    
    function editarJugador (event){
        console.log("hola");

        let fila = event.currentTarget.parentElement;
        id = fila.id.split("jugador")[1];
        console.log(id);
        
        
        /*
        var tds = event.path[1].children
            var datos = []
            for (var i = 0; i < tds.length; i++) {
                datos.push(tds[i].innerText)
            }
        console.log(datos);
          */


    }    
    function eliminarJugador (){
        console.log("hola");

    } 

    //document.querySelector("#btn-agregarRow").addEventListener("click", enviarFormulario );

    function agregarJugador (){
        
        let nro = document.querySelector("#inputNro").value;
        let pos = document.querySelector("#inputPos").value;
        let nombre = document.querySelector("#inputNombre").value;
        let altura = document.querySelector("#inputAltura").value;
        let edad = document.querySelector("#inputEdad").value;
    
        //let fila = { "thing": { numero: nro, posicion: pos, nombre: nombre, altura: altura + " m", edad: edad + " años" } };


        
        
    }

    /*document.querySelector("#form-jugador").addEventListener("submit", (event) => {
        event.preventDefault();
        if (document.querySelector("#input-id").value != null && document.querySelector("#input-id").value != ''){
            modificarJugador();
        }
        else{agregarJugador();}
    });
*/

}