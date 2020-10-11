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
      <input type="text" id="login"  name="email" placeholder="mail">
      <input type="text" id="password"  name="password" placeholder="password">
      <input type="submit"  class="buttonAceptar" value="Log In">
    </form>
  </div>

{include file="footer.tpl"}

