<?php

require_once "./libs/smarty/Smarty.class.php";

class HomeView{

        private $title;

        function __construct(){
            $this->title = "VOLLEY !!!";
        }

        function showHome($session = null){
            $smarty = new Smarty();
            $smarty->assign('titulo', $this->title);
            $smarty->assign('url',BASE_URL);
            $smarty->assign('session',$session);                
            $smarty->display('templates/home.tpl');

        }

     
       function showHomeLocation(){
            header("Location: ".BASE_URL."home");
        }

}
?>