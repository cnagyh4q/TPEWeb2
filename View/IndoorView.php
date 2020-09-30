<?php

require_once "./libs/smarty/Smarty.class.php";

class IndoorView{

        private $title;

      
       function __construct(){
            $this->title = "INDOOR !!!";
        }

        function ShowIndoor($jugadores=null,$posiciones=null,$accion=null){

            if (is_null($accion)){
                $accion = "agregar";
            }
            $smarty = new Smarty();
            $smarty->assign('titulo', $this->title);
            $smarty->assign('accion', $accion);
            $smarty->assign('jugadores_voley', $jugadores);
            $smarty->assign('posiciones',$posiciones);
            $smarty->display('templates/indoor.tpl');

        }

        function ShowIndoorLocation(){
            header("Location: ".BASE_URL."indoor");
        }

}
?>