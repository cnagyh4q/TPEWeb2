<?php

require_once "./libs/smarty/Smarty.class.php";


class IndoorView{

        private $title;
          
       function __construct(){
            $this->title = "INDOOR !!!";
          
        }

        function showIndoor($jugadores,$posiciones, $session = null){
            $smarty = new Smarty();
            $smarty->assign('titulo', $this->title);
            $smarty->assign('jugadores_voley', $jugadores);
            $smarty->assign('session', $session);
            $smarty->assign('posiciones',$posiciones);
            $smarty->assign('url',BASE_URL);
            $smarty->display('templates/indoor.tpl');

        }

        function showAddJugador($posiciones , $session = null){
            
                $smarty = new Smarty();
                $smarty->assign('titulo', $this->title);
                $smarty->assign('posiciones',$posiciones);
                $smarty->assign('session',$session);
                $smarty->assign('accion',"agregar");
                $smarty->assign('url',BASE_URL);
                $smarty->display('templates/formAddJugador.tpl');
            
        }

        function showDetalleJugador($jugador,$posiciones , $session = null){
            $smarty = new Smarty();
            $smarty->assign('titulo', $this->title);
            $smarty->assign('session',$session);
            $smarty->assign('posiciones',$posiciones);
            $smarty->assign('jugador', $jugador);
            $smarty->assign('url',BASE_URL);
            $smarty->display('templates/detalleJugador.tpl');

        }

        function showModificarJugador($jugador,$posiciones,$session = null){
           
                $smarty = new Smarty();
                $smarty->assign('titulo', $this->title);
                $smarty->assign('jugador', $jugador);
                $smarty->assign('session',$session);
                $smarty->assign('posiciones',$posiciones);
                $smarty->assign('accion',"editar");
                $smarty->assign('url',BASE_URL);
                $smarty->display('templates/formEditarJugador.tpl');
           
        }

        function showIndoorLocation(){
            header("Location: ".BASE_URL."indoor");
        }

}
?>