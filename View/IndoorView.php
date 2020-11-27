<?php

require_once "./libs/smarty/Smarty.class.php";


class IndoorView{

        private $smarty;
          
       function __construct(){
        $this->smarty = new Smarty();
        $this->smarty->assign('titulo', "INDOOR");
        $this->smarty->assign('url',BASE_URL);
          
        }

        function showIndoor($jugadores,$posiciones, $session = null,$nroPag,$cantMostrar,$totalPaginas){
          
            $this->smarty->assign('jugadores_voley', $jugadores);
            $this->smarty->assign('pagina', $nroPag);
            $this->smarty->assign('cantMostrar', $cantMostrar);
            $this->smarty->assign('totalPaginas', $totalPaginas);
            $this->smarty->assign('session', $session);
            $this->smarty->assign('posiciones',$posiciones);
            $this->smarty->display('templates/indoor.tpl');

        }

        function showAddJugador($posiciones , $session = null){
            
            $this->smarty->assign('posiciones',$posiciones);
            $this->smarty->assign('session',$session);
            $this->smarty->assign('accion',"agregar"); 
            $this->smarty->display('templates/formAddJugador.tpl');
            
        }

        function showDetalleJugador($jugador , $session = null){
            
            $this->smarty->assign('session',$session);
            $this->smarty->assign('jugador', $jugador);
            $this->smarty->display('templates/detalleJugador.tpl');

        }

        function showModificarJugador($jugador,$posiciones,$session = null){
           
               
            $this->smarty->assign('jugador', $jugador);
            $this->smarty->assign('session',$session);
            $this->smarty->assign('posiciones',$posiciones);
            $this->smarty->assign('accion',"editar");              
            $this->smarty->display('templates/formEditarJugador.tpl');
           
        }

        function showIndoorLocation(){
            header("Location: ".BASE_URL."indoor");
        }

}
?>