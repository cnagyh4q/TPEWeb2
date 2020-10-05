{include file="header.tpl"} 

<form action="{$accion}ID/{$jugador->id}" method="post" id="form-jugador" class="">
    
    <input id="input-id" name="id" value="{$jugador->id}" type="hidden"> </input>
    <input type="number" name="numero" placeholder="{$jugador->numero}" id="inputNro" required>  </input>
    {*<input type="text" name="posicion" placeholder="Posicion en la que juega" id="inputPos" required> </input>*}

    <select name="selectPosiciones">    
        {foreach from=$posiciones item=posicion}
            <option value="{$posicion->id}">{$posicion->nombre}</option>
        {/foreach}}
    </select>
    <input type="text" name="nombre" placeholder="{$jugador->nombre}" id="inputNombre" required>  </input>
    <input type="number" name="altura" placeholder="{$jugador->altura}" id="inputAltura" step="0.01" required>  </input>
    <input type="number" name="edad" placeholder="{$jugador->edad}" id="inputEdad" required> </input>
    <input class="buttonAceptar" type="submit" id="btn-agregarRow" value="Modificar Jugador"></input>
</form>
{include file="footer.tpl"} 