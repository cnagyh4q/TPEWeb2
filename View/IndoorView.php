<?php

require_once "./libs/smarty/Smarty.class.php";
require_once "./View/HomeView.php";

class IndoorView{

        private $title;
        private $viewHome;
      
       function __construct(){
            $this->title = "INDOOR !!!";
            $this->viewHome = new HomeView();
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

        function ShowAddJugador($posiciones=null , $session){
            if ($session->validSession() && $session->isAdmin()){
                $smarty = new Smarty();
                $smarty->assign('titulo', $this->title);
                $smarty->assign('posiciones',$posiciones);
                $smarty->assign('accion',"agregar");
                $smarty->assign('url',BASE_URL);
                $smarty->display('templates/formAddJugador.tpl');
            }
            else{
                $this->viewHome->ShowHome($session);
            }
        }

        function ShowDetalleJugador($jugador=null,$posiciones=null){
            $smarty = new Smarty();
            $smarty->assign('titulo', $this->title);
            $smarty->assign('posiciones',$posiciones);
            $smarty->assign('jugador', $jugador);
            $smarty->assign('url',BASE_URL);
            $smarty->display('templates/detalleJugador.tpl');

        }

        function ShowModificarJugador($jugador=null,$posiciones=null,$session){
            if ($session->validSession() && $session->isAdmin()){
                $smarty = new Smarty();
                $smarty->assign('titulo', $this->title);
                $smarty->assign('jugador', $jugador);
                $smarty->assign('posiciones',$posiciones);
                $smarty->assign('accion',"editar");
                $smarty->assign('url',BASE_URL);
                $smarty->display('templates/formEditarJugador.tpl');
            }
            else{
                $this->viewHome->ShowHome($session);
            }
        }

        function ShowIndoorLocation(){
            header("Location: ".BASE_URL."indoor");
        }

}
?>