{include file="header.tpl"}

<div class="conteiner">

    <article class="conteiner-left">

        <h3>{$titulo}  </h3>

        <p>  jugadores a ser eliminados con sus respectivos comentarios e imagenes</p>
  
        <section class="table-responsive">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>N.º</th>
                        <th>Posicion</th>
                        <th>Nombre</th>
                    </tr>
                </thead>
                <tbody class="tablaInfoEquipo">
                    {foreach from=$jugadores item=jugador }
                    <tr >
                        <td>{$jugador->numero}</td>                        
                        <td>{$jugador->posicion}</td>                       
                        <td>{$jugador->nombre}</td>                    
                    </tr>
                    {/foreach}
                </tbody>
            </table>        

        </section>
        <a href="eliminarPosicion/{$idPos}/?accept=true" >Confirmar</a>
    </article>
</div>
{include file="footer.tpl"}