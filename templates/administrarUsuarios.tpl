{include file="header.tpl"}

<div class="conteiner">

    <article class="conteiner-left">

        <h3>Usuarios</h3>
        {if $error}
            <div class="alert alert-danger" role="alert"> 
            {$error}
            </div>
        {/if}

        <section class="table-responsive">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Rol</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody class="tablaInfoUsuarios">
                    {foreach from=$usuarios item=usuario }
                    <tr id="usuario{$usuario->id}">
                        <td>{$usuario->nombre}</td>
                        <td>{$usuario->email}</td>
                        {if isset($editando) && ($editando==$usuario->id)}
                        <td>
                            <form action="editUser/{$usuario->id}" method="POST">
                            <select name="selectRoles">
                                {foreach from=$roles item=rol}
                                {if $usuario->id_rol eq $rol->id}
                                <option value="{$usuario->id_rol}" selected="selected">{$rol->permiso}</option>
                                {else}
                                <option value="{$rol->id}">{$rol->permiso}</option>
                                {/if}
                                {/foreach}}
                            </select>
                            {if isset($editando) && ($editando==$usuario->id)}
                                <td><button type="submit">Aceptar</button></td> {*Aceptar *}
                            {/if} 
                            </form>
                        </td>
                        {else}
                            <td>{$usuario->permiso}</td>
                            {if !($session->getEmail() eq $usuario->email)}
                                <td><a href="editUser/{$usuario->id}" class="edit fa fa-pencil-square-o" /></td>
                                <td><a href="deleteUser/{$usuario->id}" class="fa fa-ban delet" /></td>
                            {/if}
                        {/if}   
                    </tr>

                    {/foreach}

                 </tbody>
            </table>
        
            
        

        </section>
    </article>
</div>
{include file="footer.tpl"}