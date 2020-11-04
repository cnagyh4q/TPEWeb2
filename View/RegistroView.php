<?php

require_once "./libs/smarty/Smarty.class.php";

class RegistroView{


   private $smarty;
        
   function __construct(){
       
       $this->smarty = new Smarty();
       $this->smarty->assign('titulo', "Registro de Usuario");
       $this->smarty->assign('url',BASE_URL);
   }

   function showRegistro($message = ''){
    
      $this->smarty->assign('message',$message);
      $this->smarty->display('templates/registro.tpl');

   }

}


?>