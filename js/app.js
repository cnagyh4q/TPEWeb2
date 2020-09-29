import {tabla ,actualizar } from './tabla.js';

import {default as home} from './form.js';

document.addEventListener("DOMContentLoaded", function () {
    
    
    document.querySelector("#iconMenu").addEventListener("click", mostrarMenu);

    function mostrarMenu() {
        let menu = document.querySelector("#menu");
        if (menu.className === "menu") {
            menu.className += " menu-responsive";
        } else {
            menu.className = "menu";
        }
    }


  

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

    // document.querySelector("#btn-beach").addEventListener("click", event => {
    //     document.querySelector("#btn-home").classList.remove("actual");
    //     document.querySelector("#btn-indoor").classList.remove("actual");
    //     event.currentTarget.classList.add("actual");
    //     cargarPagina("beachvolley");


    // });


    document.querySelector("#btn-indoor").addEventListener("click", event => {
        document.querySelector("#btn-home").classList.remove("actual");
        // document.querySelector("#btn-beach").classList.remove("actual");
        event.currentTarget.classList.add("actual");
        cargarPagina("indoor");




    });


    //cargarPagina("home");

});