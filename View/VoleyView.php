<?php

require_once "./libs/smarty/Smarty.class.php";

class VoleyView{

        private $title;

        function __construct(){
            $this->title = "VOLLEY !!!";
        }

        function ShowHome($jugadores=null,$posiciones=null){

            $smarty = new Smarty();
            $smarty->assign('titulo', $this->title);
            $smarty->assign('jugadores_voley', $jugadores);
            $smarty->assign('posiciones',$posiciones);
            $smarty->display('templates/homeVoley.tpl');

        }

        function ShowHomeLocation(){
            header("Location: ".BASE_URL."home");
        }

}
?>