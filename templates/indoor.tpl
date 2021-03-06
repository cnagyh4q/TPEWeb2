{include file="header.tpl"}
<div class="banner-image">
    <img src="image/banner/BannerIndoor.jpg" alt="Banner Indoor">
</div>
<div class="conteiner">

    <article class="conteiner-left">
        <section>
            <h2>Selección masculina de voleibol de Argentina</h2>
            <p>
                La Selección de voleibol de Argentina es el equipo nacional de voleibol masculino de Argentina, controlado por la Federación de Voleibol Argentino (FEVA). Representa al país tanto en competiciones internacionales como en encuentros amistosos. Los mayores
                logros conseguidos son la medalla de bronce en el Campeonato Mundial de 1982 y en los Juegos Olímpicos de 1988. En la última década, estuvo ubicado entre los primeros diez de la Clasificación mundial de la FIVB. En los últimos
                años, el equipo finalizó cuarto en los Juegos Olímpicos de Sídney 2000 y quinto en Atenas 2004, Londres 2012 y Río de Janeiro 2016. A nivel continental, Argentina ganó la medalla de oro en el Campeonato Sudamericano en 1964, como
                así también dieciocho medallas de plata y ocho de bronce. En 1995, la Selección argentina de voleibol dirigida por Daniel Castellani, ganó la final de los Juegos Panamericanos de Mar del Plata, derrotando a la selección de Estados
                Unidos por 3-2. En la Selección estuvieron Marcos Milinkovic, Javier Weber, Jorge Elgueta, Pablo Pereira, Eduardo Rodríguez, entre otros. En 2015, la Selección dirigida por Julio Velasco, repitió el título panamericano en los Juegos
                Panamericanos de Toronto derrotando en la final a Brasil 3 a 2. En la Selección estuvieron Facundo Conte, Sebastián Solé, Pablo Crer, Luciano De Cecco, Nicolás Uriarte, Ezequiel Palacios, Javier Filardi, Luciano Zornetta, Sebastián
                Closter, Maximiliano Gauna, José Luis González y Martín Ramos.1​ En 2019, dirigidos por Horacio Dileo, se consagraron campeones por segunda vez consecutiva en los Juegos Panamericanos de Lima tras vencer a Cuba 3 a 0. La Selección
                estuvo conformada por Nicolás Bruno, Lisandro Zanotti, Facundo Imhoff, Jan Martínez, Gastón Fernández, Franco Massimino, Joaquín Gallego, Nicolás Lazo, Luciano Palonsky, Germán Johansen, Matías Sánchez y Matías Giraudo.2​ Hugo
                Conte y Marcos Milinkovic figuran en la lista de la FIVB de los 25 jugadores más destacados de la historia del vóley.
            </p>

        </section>
        <label for="filtro">filtro por posiciones</label>
        <select name="filtro" id="filtro" placeholder="Seleccione">
            <option value="all" selected="selected">Todas</option>
            {foreach from=$posiciones item=posicion}
                        <option value="{$posicion->nombre}">{$posicion->nombre}</option>

            {/foreach}

        </select>
        <h3>Equipo Actual</h3>
        <section class="table-responsive">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>N.º</th>
                        <th>Posicion</th>
                        <th>Nombre</th>
                        <th>Detail</th>
                        {if isset($session) && $session->isAdmin()}
                        <th>Edit</th>
                        <th>Delete</th>
                        {/if}
                    </tr>
                </thead>
                <tbody class="tablaInfoEquipo">
                    {foreach from=$jugadores_voley item=jugador }
                    <tr id="jugador{$jugador->id}">
                        <td>{$jugador->numero}</td>                        
                        <td>{$jugador->posicion}</td>
                        
                        <td>{$jugador->nombre}</td>
                        <td><a href="detalle/{$jugador->id}" class="fa fa-list-alt" aria-hidden="true" /></td>
                        {if isset($session) && $session->isAdmin()}

                        <td><a href="editar/{$jugador->id}" class="edit fa fa-pencil-square-o" /></td>
                        <td><a href="eliminar/{$jugador->id}" class="fa fa-ban delet" /></td>
                        {/if}
                    </tr>

                    {/foreach}
                </tbody>
            </table>
            <nav aria-label="...">
                <ul class="pagination pagination-lg">
                    {for $i=1 to ($totalPaginas) }
                  
                    {if $i == $pagina }
                    <li class="page-item disabled">
                        <a class="page-link " href="indoor/?pag={$i}&cant={$cantMostrar}" tabindex="-1">{$i}</a>
                    </li>
                    
                    {else}
                        <li class="page-item ">
                        <a class="page-link " href="indoor/?pag={$i}&cant={$cantMostrar}" >{$i}</a>
                    </li>
                    {/if}
                    {/for}
                </ul>
                <label>Elegir cantidad a Mostrar :</label><input id="inputCantMostrar" class="col-md-1" type="number" min="1" pattern="^[0-9]+" value="{$cantMostrar}"   />
            </nav>
            {if isset($session) && $session->isAdmin()}
            <div>
                <a class="btn btn-outline-primary" href="editarPosiciones"> Administrar Posiciones</a>
                <a class="btn btn-outline-primary" href="agregarJ"> Agregar</a>
            </div>
            {/if}

        </section>
    </article>

    <aside class="conteiner-right">
        <section>
            <h3> COMUNICADO: FINALIZADAS LA LIGA FEMENINA Y TORNEO ARGENTINO </h3>
            <img src="image/indoor/Feva.jpeg" alt="Logo FEVA" />
            <section>
                <p>De acuerdo a la nota 085/2020 emitida el 18 de marzo en la que se especificaba que la continuidad de la Liga Argentina Femenina y Torneo Argentino de Clubes 2020 quedaba supeditada a las restricciones del Gobierno Nacional por
                    la pandemia del COVID-19 con plazo hasta el 1° de abril, la Federación de Voleibol Argentino comunica que:
                </p>
                <p>
                    Ante la dedición del Gobierno Nacional de prolongar el Aislamiento Social Preventivo Obligatorio hasta el próximo 13 de abril, se dan por finalizadas ambas competencias organizadas por la FeVA.
                </p>
                <p>
                    Asimismo y como se expresó en dicha nota, no se determinarán posiciones finales ni se producirán los descensos establecidos. </p>
            </section>
            <img src="image/indoor/nota.jpg" alt="Nota Feva ">

        </section>

    </aside>
</div>

<script src="js/tablaNew.js"></script>

{include file="footer.tpl"}