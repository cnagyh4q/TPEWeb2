<?php

require_once "./libs/smarty/Smarty.class.php";

class IndoorView{

        private $title;

      
       function __construct(){
            $this->title = "INDOOR !!!";
        }

        function ShowIndoor($jugadores=null,$posiciones=null , $session){

            $smarty = new Smarty();
            $smarty->assign('titulo', $this->title);
            $smarty->assign('jugadores_voley', $jugadores);
            $smarty->assign('session', $session);
            $smarty->assign('posiciones',$posiciones);
            $smarty->assign('url',BASE_URL);
            $smarty->display('templates/indoor.tpl');

        }

        function ShowAddJugador($posiciones=null){
            $smarty = new Smarty();
            $smarty->assign('titulo', $this->title);
            $smarty->assign('posiciones',$posiciones);
            $smarty->assign('accion',"agregar");
            $smarty->assign('url',BASE_URL);
            $smarty->display('templates/formAddJugador.tpl');

        }

        function ShowDetalleJugador($jugador=null,$posiciones=null){
            $smarty = new Smarty();
            $smarty->assign('titulo', $this->title);
            $smarty->assign('posiciones',$posiciones);
            $smarty->assign('jugador', $jugador);
            $smarty->assign('url',BASE_URL);
            $smarty->display('templates/detalleJugador.tpl');

        }

        function ShowModificarJugador($jugador=null,$posiciones=null){

            $smarty = new Smarty();
            $smarty->assign('titulo', $this->title);
            $smarty->assign('jugador', $jugador);
            $smarty->assign('posiciones',$posiciones);
            $smarty->assign('accion',"editar");
            $smarty->assign('url',BASE_URL);
            $smarty->display('templates/formEditarJugador.tpl');

        }

        function ShowIndoorLocation(){
            header("Location: ".BASE_URL."indoor");
        }

}
?>