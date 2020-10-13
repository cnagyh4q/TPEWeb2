{include file="header.tpl"}

<div class="conteiner">

    <article class="conteiner-left">

        <h3>Posiciones</h3>
        <section class="table-responsive">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>Posicion</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody class="tablaInfoPosiciones">
                    {foreach from=$posiciones item=posicion }
                    <tr id="posicion{$posicion->id}">
                        <td>{$posicion->nombre}</td>

                        <td><a href="editarPosicion/{$posicion->id}" class="edit fa fa-pencil-square-o" /></td>
                        <td><a href="eliminarPosicion/{$posicion->id}" class="fa fa-ban delet" /></td>
                    </tr>

                    {/foreach}
                </tbody>
            </table>
        
            <div>
                <a class="btn btn-outline-primary" href="agregarPosicion"> Agregar Posicion</a>
            </div>
        

        </section>
    </article>
</div>
{include file="footer.tpl"}