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


        function __construct (){

            $this->homeView = new HomeView();
            $this->model = new PosicionesModel();
            $this->posicionesView = new PosicionesView();
            $this->session = new Session();

        }





        function PanelEdicionPos(){
            if ($this->session->validSession() && $this->session->isAdmin()){
                $posiciones = $this->model->GetPosiciones();
                $this->posicionesView->EdicionPosiciones($posiciones,$this->session);

            }
            else{
                $this->homeView->ShowHome($this->session);
            }

        }

        function AgregarPosicionDB(){
            if ($this->session->validSession() && $this->session->isAdmin()){
                    if(isset($_POST['nombre'])){    
    
                        $this->model->insertarPosicion($_POST['nombre']);
                    
                    }
                    $this->homeView->ShowHome($this->session);
            }
            else{
                 $this->homeView->ShowHome($this->session);
            }         
        }

        function AgregarPosicion(){
            if ($this->session->validSession() && $this->session->isAdmin()){
            
                $this->posicionesView->AgregarPosicion($this->session);
            
            }
            else{
                $this->homeView->ShowHome($this->session);
            }

        }

        function EditarPosicion($params = null){
            if ($this->session->validSession() && $this->session->isAdmin()){
                $id= $params[':ID'];
                $posicion = $this->model->GetPosicion($id);
                $this->posicionesView->EditarPosicion($posicion,$this->session);
            
            }
            else{
                $this->homeView->ShowHome($this->session);
            }

        }

        function EditarPosicionDB($params = null){
            if ($this->session->validSession() && $this->session->isAdmin()){
                    $id= $params[':ID'];
                    $this->model->editarPosicion($id,$_POST['nombre']);
                    $this->homeView->ShowHome($this->session);
                }
            else{
                    $this->homeView->ShowHome($this->session);
            }

        }

        function EliminarPosicionDB($params = null){
            if ($this->session->validSession() && $this->session->isAdmin()){
                $id= $params[':ID'];
                $this->model->EliminarPosicion($id);
                $this->homeView->ShowHome($this->session);
            }
            else{
                $this->homeView->ShowHome($this->session);
            }
        }


        
    
    }

?>