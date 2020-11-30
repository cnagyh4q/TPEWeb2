<?php

    require_once "./View/HomeView.php";
    require_once "./View/PosicionesView.php";
    require_once "./Model/PosicionesModel.php";
    require_once "./Controller/Session.php";

    class PosicionesController {

        private  $model;
        private  $session; 
        private  $posicionesView;
        private  $homeView;
        private  $login;


        function __construct (){

            $this->homeView = new HomeView();
            $this->model = new PosicionesModel();
            $this->posicionesView = new PosicionesView();
            $this->session = new Session();
            $this->login = new LoginView();

        }





        function panelEdicionPos(){
            if ($this->session->validSession() && $this->session->isAdmin()){
                $posiciones = $this->model->getPosiciones();
                $this->posicionesView->edicionPosiciones($posiciones,$this->session);

            }
            else{
                $this->login->showLogin("Se requiere permisos");
            }

        }

        function agregarPosicionDB(){
            if ($this->session->validSession() && $this->session->isAdmin()){
                    if(isset($_POST['nombre'])){    
    
                        $this->model->insertarPosicion($_POST['nombre']);
                    
                    }
                    header("Location: " . $_SERVER['HTTP_REFERER']);
                    //$this->homeView->showHome($this->session);
            }
            else{
                $this->login->showLogin("Se requiere permisos");
            }         
        }

        function agregarPosicion(){
            if ($this->session->validSession() && $this->session->isAdmin()){
            
                $this->posicionesView->agregarPosicion($this->session);
            
            }
            else{
                $this->login->showLogin("Se requiere permisos");
            }

        }

        function editarPosicion($params = null){
            if ($this->session->validSession() && $this->session->isAdmin()){
                $id= $params[':ID'];
                $posicion = $this->model->getPosicion($id);
                $this->posicionesView->editarPosicion($posicion,$this->session);
            
            }
            else{
                $this->login->showLogin("Se requiere permisos");
            }

        }

        function editarPosicionDB($params = null){
            if ($this->session->validSession() && $this->session->isAdmin()){
                    $id= $params[':ID'];
                    if (isset($_POST['nombre'])){
                    $this->model->editarPosicion($id,$_POST['nombre']);
                    }
                    $this->homeView->ShowHome($this->session);
                }
            else{
                $this->login->showLogin("Se requiere permisos");
            }

        }

        function eliminarPosicionDB($params = null){
            if ($this->session->validSession() && $this->session->isAdmin()){
                $id= $params[':ID'];
                $this->model->eliminarPosicion($id);
                header("Location: " . $_SERVER['HTTP_REFERER']);
            }
            else{
                $this->login->showLogin("Se requiere permisos");
            }
        }


        
    
    }

?>