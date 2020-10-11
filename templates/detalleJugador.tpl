{include file="header.tpl"}

<div class="detalleContent">
    <div class="card" style="width: 18rem;">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">{$jugador->numero}</li>
            <li class="list-group-item">
                {foreach from=$posiciones item=posicion}
                {if $jugador->id_posicion eq $posicion->id}
                {$posicion->nombre}
                {/if}
                {/foreach}
            </li>
            <li class="list-group-item">
                {$jugador->nombre}
            </li>
            <li class="list-group-item">
                {$jugador->altura}
            </li>
            <li class="list-group-item">
                {$jugador->edad}
            </li>
        </ul>
    </div>
    <a class="buttonVolver"  href="indoor">Volver</a>
</div>








{include file="footer.tpl"}