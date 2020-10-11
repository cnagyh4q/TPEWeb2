<?php

require_once "./libs/smarty/Smarty.class.php";

class LoginView{


   function showLogin($message = ''){

    $smarty = new Smarty();
    $smarty->assign('url',BASE_URL);
    $smarty->assign('message',$message);
    $smarty->display('templates/login.tpl');

   }

}


?>