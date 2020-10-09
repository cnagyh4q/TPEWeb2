<?php

require_once "./libs/smarty/Smarty.class.php";

class LoginView{


   function showLogin(){

    $smarty = new Smarty();
    $smarty->assign('url',BASE_URL);
    $smarty->assign('message',"Hola");
    $smarty->display('templates/login.tpl');

   }

   function showHome(){

      $smarty = semarty();
      $smarty->assign('url',BASE_URL);
      //$smarty->assign('message',"Hola");
      $smarty->display('templates/home.tpl');

   }
}


?>