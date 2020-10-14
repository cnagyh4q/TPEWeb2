{include file="header.tpl"}
<div class="banner-image">
    <img src="image/banner/BannerIndoor.jpg" alt="Banner Indoor">
</div>
<div class="box">


    <form action="{$accion}ID/{$jugador->id}" method="post" id="form-jugador" class="">

        <input id="input-id" name="id" value="{$jugador->id}" type="hidden"/>
        <input type="number" name="numero" placeholder="Nro Jugador" value="{$jugador->numero}" id="inputNro" required/>

        <select name="selectPosiciones">
            {foreach from=$posiciones item=posicion}
            {if $posicion->id eq $jugador->id_posicion}
            <option value="{$posicion->id}" selected="selected">{$posicion->nombre}</option>
            {else}
            <option value="{$posicion->id}">{$posicion->nombre}</option>
            {/if}
            {/foreach}}
        </select>
        <input type="text" name="nombre" id="inputNombre" placeholder="Nombre del Jugador" value="{$jugador->nombre}" required/>
        <input type="number" name="altura" placeholder="Altura del Jugador" id="inputAltura" step="0.01" value="{$jugador->altura}" required/>
        <input type="number" name="edad" placeholder="Edad del Jugador" id="inputEdad" value="{$jugador->edad}" required/>
        <input class="buttonAceptar" type="submit" id="btn-agregarRow" value="Modificar Jugador"/>
    </form>
</div>
<a class="buttonVolver" href="indoor">Volver</a>
{include file="footer.tpl"}