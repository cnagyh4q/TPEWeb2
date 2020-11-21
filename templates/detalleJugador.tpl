{include file="header.tpl"}


<div id = {$jugador->id} class="detalleContent">

    <div  class="card" >
    <h2> Detalle Jugador </h2>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Numero: {$jugador->numero}</li>
            <li class="list-group-item"> Posicion: {$jugador->posicion}</li>
            <li class="list-group-item">
                Nombre: {$jugador->nombre}
            </li>
            <li class="list-group-item">
                Altura: {$jugador->altura} m
            </li>
            <li class="list-group-item">
                Edad: {$jugador->edad} Años
            </li>
        </ul>
    </div> 
    {include file="Vue/Comentarios.tpl"}   
   
    <script src="js/comentario.js"></script>
</div>
<a class="buttonVolver"  href="indoor">Volver</a>

{include file="footer.tpl"}