<?php

require_once "./libs/smarty/Smarty.class.php";

class LoginView{


   private $smarty;
        
   function __construct(){
       
       $this->smarty = new Smarty();
       $this->smarty->assign('titulo', "LOGIN");
       $this->smarty->assign('url',BASE_URL);
   }

   function showLogin($message = ''){
    
      $this->smarty->assign('message',$message);
      $this->smarty->display('templates/login.tpl');

   }

}


?>