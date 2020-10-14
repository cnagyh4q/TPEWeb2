{include file="header.tpl"}
<div class="banner-image">
    <img src="image/banner/BannerIndoor.jpg" alt="Banner Indoor">
</div>
<div class="box">
    <form action="{$accion}" method="post" id="form-jugador" class="">

        <input id="input-id" name="id" value="" type="hidden">
        <input type="number" name="numero" placeholder="Nro Jugador" id="inputNro" required/>
        <select name="selectPosiciones">
            {foreach from=$posiciones item=posicion}
            <option value="{$posicion->id}">{$posicion->nombre}</option>
            {/foreach}
        </select>
        <input type="text" name="nombre" placeholder="Nombre del Jugador" id="inputNombre" required/>
        <input type="number" name="altura" placeholder="Altura del Jugador" id="inputAltura" step="0.01" required/>
        <input type="number" name="edad" placeholder="Edad del Jugador" id="inputEdad" required/>
        <input class="buttonAceptar" type="submit" id="btn-agregarRow" value="Agregar Jugador"/>
    </form>
</div>
{include file="footer.tpl"}