{include file="header.tpl"}
<div class="banner-image">
    <img src="image/banner/BannerIndoor.jpg" alt="Banner Indoor">
</div>
<div class="box">
    <form action="{$accion}/{$posicion->id}" method="post" id="form-jugador" class="">

        <input id="input-id" name="id" value="{$posicion->id}" type="hidden">
        <input type="text" name="nombre" placeholder="Nombre de la Posicion" value="{$posicion->nombre}" id="inputNombre" required /> 
        <input class="buttonAceptar" type="submit" id="btn-agregarRow" value="Modificar Posicion"/>
    </form>
    <a class="buttonVolver"  href="indoor">Volver</a>
</div>

{include file="footer.tpl"}