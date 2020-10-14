<?php

require_once "./libs/smarty/Smarty.class.php";

class HomeView{

       
        private $smarty;
        
        function __construct(){
            
            $this->smarty = new Smarty();
            $this->smarty->assign('titulo', "VOLLEY");
            $this->smarty->assign('url',BASE_URL);
        }

        function showHome($session = null){             
            $this->smarty->assign('session',$session);                
            $this->smarty->display('templates/home.tpl');
        }

     
       function showHomeLocation(){
            header("Location: ".BASE_URL."home");
        }

}
?>