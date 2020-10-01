

    function edit(id){
        document.querySelector("#input-id").value=id;  
        document.querySelector("#btn-agregarRow").value='Modificar Jugador';
        mostrarForm();    
    }    


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

    document.querySelector("#btn-agregarJugador").addEventListener("click", ()=>{
        document.querySelector("#input-id").value='';
        document.querySelector("#btn-agregarRow").value='Agregar Jugador'; 
        mostrarForm();
    });

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
        let form = document.querySelector("#form-jugador");
        form.action="agregar";        
        form.submit();
        
    }

    function modificarJugador(){
        let form = document.querySelector("#form-jugador");
        form.action="modificarjugador";        
        form.submit();
    }

   document.querySelector("#form-jugador").addEventListener("submit", (event) => {
        event.preventDefault();
        if (document.querySelector("#input-id").value != null && document.querySelector("#input-id").value != ''){
            modificarJugador();
        }
        else{agregarJugador();}
    });


