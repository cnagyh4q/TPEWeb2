<div>
    <button id="btn-agregarJugador">Agregar</button>
</div>
<form action="{$accion}" method="post" id="form-jugador" class="oculto">
    <input id="input-id" type="hidden">
    <input type="number" name="numero" placeholder="Nro Jugador" id="inputNro" required> </input>
    {*<input type="text" name="posicion" placeholder="Posicion en la que juega" id="inputPos" required> </input>*}

    <select name="selectPosiciones">    
        {foreach from=$posiciones item=posicion}
            <option value="{$posicion->id}">{$posicion->nombre}</option>
        {/foreach}}
    </select>
    <input type="text" name="nombre" placeholder="Nombre del Jugador" id="inputNombre" required> </input>
    <input type="number" name="altura" placeholder="Altura del Jugador" id="inputAltura" step="0.01" required> </input>
    <input type="number" name="edad" placeholder="Edad del Jugador" id="inputEdad" required> </input>
    <input class="buttonAceptar" type="submit" id="btn-agregarRow" value="Agregar Jugador"></input>
</form>