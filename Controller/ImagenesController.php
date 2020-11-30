<?php

     require_once "./View/ImagenView.php";
    require_once "./Model/ImagenModel.php";
    require_once "./Controller/Session.php";

    class ImagenController {

        private  $model;
        private  $session; 
        private  $view;
        private  $login;


        function __construct (){

            $this->model = new ImagenModel();
            $this->posicionesView = new ImagenView();
            $this->session = new Session();
            $this->login = new LoginView();

        }





  
        function agregarImagen(){
            if ($this->session->validSession() && $this->session->isAdmin()){
                    if(isset($_POST['nombre'])){    
    
                        $this->model->agregarImagen($_POST['nombre']);
                    
                    }
                    $this->homeView->showHome($this->session);
            }
            else{
                $this->login->showLogin("Se requiere permisos");
            }         
        }

       
        function eliminarImagen($params = null){
            if ($this->session->validSession() && $this->session->isAdmin()){
                $id= $params[':ID'];
                $this->model->eliminarImagen($id);
                header("Location: " . $_SERVER['HTTP_REFERER']);
            }
            else{
                $this->login->showLogin("Se requiere permisos");
            }
        }


        
    
    }

?>