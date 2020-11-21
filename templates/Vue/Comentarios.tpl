<div id="vue-comentarios">
{literal}

    <h2> Comentarios </h2>

    <ul id="comentario-list" class="list-group comentarios">
        <li 
            v-for="com in comentarios"
            :data-id-com="com.id" 
            class="list-group-item">             
            {{com.nombreUsario}} - {{ com.comentario }} - {{ com.puntaje}} 
        {/literal}
            {if isset($session) && $session->isAdmin()}   
                {literal}
              <a v-on:click="eliminar(com.id)" class="fa fa-ban delet"></a>         
            {/literal}        
            {/if}
         </li>         

    </ul>
        
{if isset($session) && $session->validSession()}
    <form id="add-comentar">
        <input type="text" name="comentario" placeholder="Comentar" required/> 
        <select name="puntaje">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select> 
        <input class="buttonAceptar" type="submit" value="Agregar Comentario"/>     
    </form>
{/if}

</div>