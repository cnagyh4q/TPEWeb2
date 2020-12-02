document.addEventListener("DOMContentLoaded", function () {
    
    
    document.querySelector("#btn-add-imagen").addEventListener("click", ()=>{
        let form =document.querySelector("#form-imagenes");
        form.classList.toggle("oculto");

    })


    document.querySelectorAll(".carousel-item")[0].classList.toggle("active");

    document.querySelector("#btn-eliminar-imagen").addEventListener("click", ()=>{

        let id = document.querySelector(".active").id;

        location.href=`eliminarImagen/${id}`;



    })

    

    


});