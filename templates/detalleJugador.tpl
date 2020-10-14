{include file="header.tpl"}

<div class="detalleContent">
    <div class="card" style="width: 18rem;">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Numero: {$jugador->numero}</li>
            <li class="list-group-item"> Posicion: 
                {foreach from=$posiciones item=posicion}
                {if $jugador->id_posicion eq $posicion->id}
                {$posicion->nombre}
                {/if}
                {/foreach}
            </li>
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
    <a class="buttonVolver"  href="indoor">Volver</a>
</div>








{include file="footer.tpl"}