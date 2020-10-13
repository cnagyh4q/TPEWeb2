<?php

require_once "./libs/smarty/Smarty.class.php";
require_once "./View/HomeView.php";

class PosicionesView{

        private $title;
        private $viewPosiciones;
      
       function __construct(){
            $this->title = "Posiciones ";
            //$this->viewPosiciones = new HomeView();
        }

        function EdicionPosiciones($posiciones = null,$session = null){
            
            $smarty = new Smarty();
            $smarty->assign('titulo', $this->title);
            $smarty->assign('session', $session);
            $smarty->assign('posiciones',$posiciones);
            $smarty->assign('url',BASE_URL);
            $smarty->display('templates/administradorPosiciones.tpl');
        }

        function AgregarPosicion($session = null){
            $smarty = new Smarty();
            $smarty->assign('titulo', $this->title);
            $smarty->assign('session', $session);
            $smarty->assign('accion',"agregarPosicion");
            $smarty->assign('url',BASE_URL);
            $smarty->display('templates/formAgregarPosicion.tpl');

        }

        function EditarPosicion($posicion = null,$session = null){
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