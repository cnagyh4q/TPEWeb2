<?php


require_once "./View/HomeView.php";
require_once "./View/RegistroView.php";
require_once "./Model/UserModel.php";
require_once "./Controller/Session.php";

 class RegistroController {

    private  $view;
    private  $viewHome;
    private  $model;
    private  $session;    

    function __construct (){
        $this->view = new RegistroView();
        $this->viewHome = new HomeView();
        $this->model = new UserModel();
        
    }

    function registrarUsuario(){
        $this->view->showRegistro();
   
    } 

  

    function agregarUsuario(){

        if( isset($_POST['nombre']) && !empty($_POST['nombre']) && isset($_POST['email']) && !empty($_POST['email']) 
                    && isset($_POST['password']) && !empty($_POST['password']) ){

                $clave_encriptada = password_hash ($_POST['password'] , PASSWORD_DEFAULT );  
                $this->model->addUser($_POST['nombre'] , $_POST['email'] ,$clave_encriptada);
                    
                $this->session = new Session($_POST['email'] , 'INVITADO');
                header("Location: ".BASE_URL."home");
                $this->viewHome->showHome($this->session);
        
        } 
        
        $this->viewHome->showHome();

    }

   

   
    
   
 }

?>