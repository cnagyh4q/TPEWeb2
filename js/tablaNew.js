document.addEventListener("DOMContentLoaded", cargarPagina);

function cargarPagina() {

    document.querySelector("#btn-agregarJugador").addEventListener("click", mostrarForm);

    function mostrarForm (){
        
        document.querySelector("#form-jugador").className ="";
        
    }

    //document.querySelector("#edit").addEventListener("click", editarElemento);
    /*
    let editar =  document.querySelectorAll(".editar");

    editar.addEventListener("click", (event) => {
        event.preventDefault();
    });
*/  
    document.querySelector(".editar").addEventListener("click", (event) => {
        event.preventDefault();
        
        document.querySelector("#form-jugador").className ="";
        /*if (document.querySelector("#input-id").value != null && document.querySelector("#input-id").value != ''){
            modificarJugador();
        }
        else{agregarJugador();}*/
    });



    document.querySelector(".eliminar").addEventListener("click", mostrarForm);
    /*
    var editar = document.getElementById("edit7");
    editar.addEventListener("click", editarJugador);

    var delet = document.getElementById("delet11");
    delet.addEventListener("click", eliminarJugador);

    */
    
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
/*  
function cargarPagina(url) {
                
    location.href = url;
            // if (url === "indoor"){
            //    // window.history.pushState("" , "Indoor" , url);
                
                
            // }

            // if (url === "home"){
            //      window.history.pushState("" , "VolleyBall" , url);
                
            // }

            // if (url === "beachvolley"){
            //     window.history.pushState("" , "Beach VolleyBall" , url);
                
            // }



}



    document.querySelector("#btn-home").addEventListener("click", event => {
        // document.querySelector("#btn-beach").classList.remove("actual");
        document.querySelector("#btn-indoor").classList.remove("actual");
        event.currentTarget.classList.add("actual");
        cargarPagina("home");


    });
    document.querySelector("#btn-indoor").addEventListener("click", event => {
        document.querySelector("#btn-home").classList.remove("actual");
        // document.querySelector("#btn-beach").classList.remove("actual");
        event.currentTarget.classList.add("actual");
        cargarPagina("indoor");




    });*/

}