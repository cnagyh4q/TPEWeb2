{include file="header.tpl"}

<form action="{$accion}ID/{$jugador->id}" method="post" id="form-jugador" class="">

    <input id="input-id" name="id" value="{$jugador->id}" type="hidden"> </input>
    <input type="number" name="numero" placeholder="Nro Jugador" value="{$jugador->numero}" id="inputNro" required> </input>
    {*<input type="text" name="posicion" placeholder="Posicion en la que juega" id="inputPos" required> </input>*}

    <select name="selectPosiciones">
        {foreach from=$posiciones item=posicion}
        {* <option value="{$posicion->id}">{$posicion->nombre}</option> *}
        {if $posicion->id eq $jugador->id_posicion}
        <option value="{$posicion->id}" selected="selected">{$posicion->nombre}</option>

        {else}
        <option value="{$posicion->id}">{$posicion->nombre}</option>
        {/if}
        {/foreach}}
    </select>
    <input type="text" name="nombre" id="inputNombre" placeholder="Nombre del Jugador" value="{$jugador->nombre}" required> </input>
    <input type="number" name="altura" placeholder="Altura del Jugador" id="inputAltura" step="0.01" value="{$jugador->altura}"  required>  </input>
    <input type="number" name="edad" placeholder="Edad del Jugador" id="inputEdad" value="{$jugador->edad}" required> </input>
    <input class="buttonAceptar" type="submit" id="btn-agregarRow" value="Modificar Jugador"></input>
</form>
{include file="footer.tpl"}