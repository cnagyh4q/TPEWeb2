{include file="header.tpl"}
<div class="banner-image">
    <img src="image/banner/BannerIndoor.jpg" alt="Banner Indoor">
</div>

  <div id="LoginContent" class="LoginContent">     
    <!-- Login Form -->
    {if $message}
      <div class="alert alert-danger" role="alert">
      {$message}
    </div>  
    {/if}
    
    <form action="login" method="post">
      <input type="email" id="login"  name="email" placeholder="mail"/>
      <input type="password" id="password"  name="password" placeholder="password"/>
      <input type="submit"  class="buttonAceptar" value="Ingresar"/>
    </form>
  </div>

{include file="footer.tpl"}

