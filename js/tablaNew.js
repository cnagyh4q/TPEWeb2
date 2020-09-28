document.addEventListener("DOMContentLoaded", cargarPagina);

function cargarPagina() {

    document.querySelector("#btn-agregarJugador").addEventListener("click", mostrarForm);

    function mostrarForm (){
        document.querySelector("#form-jugador").className ="";
        
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