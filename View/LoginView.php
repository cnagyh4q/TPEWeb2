<?php

require_once "./libs/smarty/Smarty.class.php";

class LoginView{


   function showLogin(){

    $smarty = new Smarty();
    $smarty->assign('url',BASE_URL);
    $smarty->display('templates/login.tpl');

   }


}


?>