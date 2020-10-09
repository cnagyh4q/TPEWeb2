{include file="header.tpl"}

<div class="wrapper fadeInDown">
  <div id="formContent">     
    <!-- Login Form -->
    <div class="alert alert-danger" role="alert">
      {$message}
    </div>
    <form action="verificarUsuario" method="post">
      <input type="text" id="login" class="fadeIn second" name="email" placeholder="mail">
      <input type="text" id="password" class="fadeIn third" name="password" placeholder="password">
      <input type="submit" class="fadeIn fourth" value="Log In">
    </form>
  </div>
</div>
{include file="footer.tpl"}

