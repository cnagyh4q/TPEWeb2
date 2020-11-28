<?php

require_once "./View/LoginView.php";
require_once "./View/RegistroView.php";
require_once "./Model/UserModel.php";
require_once "./Model/RolModel.php";
require_once "./Controller/Session.php";
require_once "./View/UserView.php";



class UserController
{

    private  $view;
    private  $viewLogin;
    private  $modelUser;
    private  $modelRol;
    private  $session;

    function __construct()
    {
        $this->view = new UserView();
        $this->viewLogin = new LoginView();
        $this->modelUser = new UserModel();
        $this->modelRol = new RolModel();
        $this->session = new Session();
    }



    function showUsuarios($message = '')
    {
        if ($this->session->validSession() && $this->session->isAdmin()){
            $usuarios = $this->modelUser->getAllUsers();
           $this->view->showUsuarios($message , $usuarios, $this->session);
        } else {
            $this->viewLogin->showLogin();
        }
    }
        

    function editUsuario($params)
    {
        if ($this->session->validSession() && $this->session->isAdmin()) {
            $id = $params[':ID'];
            $rol = $this->modelRol->getRolById($_POST['selectRoles']);
            if (isset($id) && !empty($id) && isset($rol) && !empty($rol)) {
                if ($this->modelUser->editarRolUsuario($id, $rol->id)) {
                    $this->showUsuarios();
                } else {
                    $this->showUsuarios("Error al editar el Usuario");
                }
            } else {
                $this->showUsuarios("Parametros invalidos");
            }
        } else {
            $this->viewLogin->showLogin();
        }
    }

    function deleteUsuario($params)
    {
        if ($this->session->validSession() && $this->session->isAdmin()) {
            $id = $params[':ID'];
            if (isset($id) && !empty($id)) {
                if ($this->modelUser->deleteUsuario($id)) {
                    $this->showUsuarios();
                } else {
                    $this->showUsuarios("Error al eliminar el usuario");
                }
            } else {
                $this->showUsuarios("Parametro id necesario");
            }
        } else {
            $this->viewLogin->showLogin();
        }
    }

    function showEditUsuario($params = null)
    {
        if ($this->session->validSession() && $this->session->isAdmin()) {
            $id = $params[':ID'];
            $usuarios = $this->modelUser->getAllUsers();
            $roles = $this->modelRol->getAllRols();
            $this->view->showUsuarios('',$usuarios, $this->session, $roles, $id);
        } else {
            $this->viewLogin->showLogin();
        }
    }
}
