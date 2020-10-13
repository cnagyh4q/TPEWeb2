{include file="header.tpl"}
<div class="banner-image">
    <img src="image/banner/BannerIndoor.jpg" alt="Banner Indoor">
</div>
<div class="box">
    <form action="{$accion}" method="post" id="form-jugador" class="">

        <input id="input-id" name="id" value="" type="hidden">
        {*<input type="text" name="posicion" placeholder="Posicion en la que juega" id="inputPos" required> </input>*}
        <input type="text" name="nombre" placeholder="Nombre de la Posicion a Agregar" id="inputNombre" required> </input>
        <input class="buttonAceptar" type="submit" id="btn-agregarRow" value="Agregar Posicion"></input>
    </form>
</div>
{include file="footer.tpl"}