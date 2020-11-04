<?php

require_once "./libs/smarty/Smarty.class.php";

class UserView{

        private $title;
             
       function __construct(){
            $this->title = "Usuarios ";
        }

        function showUsuarios($usuarios = null,$session = null,$roles = null, $editando = null){
            
            $smarty = new Smarty();
            $smarty->assign('titulo', $this->title);
            $smarty->assign('session', $session);
            $smarty->assign('editando', $editando);
            $smarty->assign('roles', $roles);
            $smarty->assign('usuarios',$usuarios);
            $smarty->assign('url',BASE_URL);
            $smarty->display('templates/administrarUsuarios.tpl');
        }

        
        function editarUsuario($usuarios,$session = null){
            $smarty = new Smarty();
            $smarty->assign('titulo', $this->title);
            $smarty->assign('session', $session);
            $smarty->assign('usuarios',$usuarios);
            $smarty->assign('accion',"editarPosicion");
            $smarty->assign('url',BASE_URL);
            $smarty->display('templates/administrarUsuarios.tpl');

        }


}

?>