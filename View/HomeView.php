<?php

require_once "./libs/smarty/Smarty.class.php";

class HomeView{

        private $title;

        function __construct(){
            $this->title = "VOLLEY !!!";
        }

        function ShowHome($session = null){
            $smarty = new Smarty();
            $smarty->assign('titulo', $this->title);
            $smarty->assign('url',BASE_URL);
            $smarty->assign('session',$session);                
            $smarty->display('templates/home.tpl');

        }

     
       function ShowHomeLocation(){
            header("Location: ".BASE_URL."home");
        }

}
?>