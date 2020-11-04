{include file="header.tpl"}
<div class="banner-image">
    <img src="image/banner/BannerIndoor.jpg" alt="Banner Indoor">
</div>

  <div id="LoginContent" class="LoginContent">     
      {if $message}
      <div class="alert alert-danger" role="alert">
      {$message}
    </div>  
    {/if}
    
    <form action="registrar" method="post">
      <input type="text" id="nombre"  name="nombre" placeholder="nombre"/>
      <input type="email" id="login"  name="email" placeholder="mail"/>
      <input type="password" id="password"  name="password" placeholder="password"/>
      <input type="submit"  class="buttonAceptar" value="Registrarse"/>
    </form>
  
  </div>

{include file="footer.tpl"}

