<?php

require_once "./libs/smarty/Smarty.class.php";

class PosicionesView{

        private $title;
             
       function __construct(){
            $this->title = "Posiciones ";
        }

        function edicionPosiciones($posiciones = null,$session = null){
            
            $smarty = new Smarty();
            $smarty->assign('titulo', $this->title);
            $smarty->assign('session', $session);
            $smarty->assign('posiciones',$posiciones);
            $smarty->assign('url',BASE_URL);
            $smarty->display('templates/administradorPosiciones.tpl');
        }

        function agregarPosicion($session = null){
            $smarty = new Smarty();
            $smarty->assign('titulo', $this->title);
            $smarty->assign('session', $session);
            $smarty->assign('accion',"agregarPosicion");
            $smarty->assign('url',BASE_URL);
            $smarty->display('templates/formAgregarPosicion.tpl');

        }

        function editarPosicion($posicion,$session = null){
            $smarty = new Smarty();
            $smarty->assign('titulo', $this->title);
            $smarty->assign('session', $session);
            $smarty->assign('posicion',$posicion);
            $smarty->assign('accion',"editarPosicion");
            $smarty->assign('url',BASE_URL);
            $smarty->display('templates/formEditarPosicion.tpl');

        }


}

?>