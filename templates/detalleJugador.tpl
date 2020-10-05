{include file="header.tpl"} 


<p>{$jugador->numero}</p>
<p>{foreach from=$posiciones item=posicion}
    {if $jugador->id_posicion eq $posicion->id}
       {$posicion->nombre}             
    {/if}
 {/foreach}
 </p>
 <p>{$jugador->nombre}</p>
 <p>{$jugador->altura}</p>
 <p>{$jugador->edad}</p>

 <a class="buttonVolver" id="btn-agregarRow" value="Modificar Jugador" href="indoor">Volver</a>




{include file="footer.tpl"} 