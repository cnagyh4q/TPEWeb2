{include file="header.tpl"}


<div id={$jugador->id} class="detalleContent">

    <div class="card">
        <h2> Detalle Jugador </h2>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Numero: {$jugador->numero}</li>
            <li class="list-group-item"> Posicion: {$jugador->posicion}</li>
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

        {if isset($session) && $session->validSession() && $session->isAdmin()}

        <button id="btn-add-imagen" class="list-group-item fa fa-file-image-o" aria-hidden="true"> Agregar Imagen/es</button>

        <div id="form-imagenes" class="oculto">
            <form action="agregarImagen/{$jugador->id}" method="POST" enctype="multipart/form-data">
                <input type="file" name="imagenes[]" multiple accept="image/*" required>
                <input name="descripcion" placeholder="Descripcion" required>
                <button type="submit" class="">Agregar imagen</button>
            </form>
        </div>
        {/if}

    </div>

    {include file="Vue/Comentarios.tpl"}

    <div class="col-10">
        {if isset($session) && $session->validSession() && $session->isAdmin() && isset($imagenes) && !empty($imagenes)}
        <button class="fa fa-ban delet" id="btn-eliminar-imagen"> Eliminar</button>
        {/if}
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                {foreach from=$imagenes item=img }
                <div id="{$img->id}" class="carousel-item">
                    <img class="d-block w-100" src="{$img->path}" alt="{$img->descripcion}">
                </div>
                {/foreach}
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

    <script src="js/comentario.js"></script>
    <script src="js/imagen.js"></script>
</div>
<a class="buttonVolver" href="indoor">Volver</a>

{include file="footer.tpl"}