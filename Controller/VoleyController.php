<?php   

    require_once "./View/HomeView.php";
    require_once "./View/IndoorView.php";
    require_once "./Model/VoleyModel.php";
    require_once "./Controller/Session.php";

    class VoleyController{

        private $homeView;
        private $indoorView;
        private $model;
        private $session;
        private $login;

        function __construct (){
            $this->indoorView = new IndoorView();
            $this->homeView = new HomeView();
            $this->model = new VoleyModel();
            $this->session = new Session();
            $this->login = new LoginView();
        }

        function Indoor(){
            $jugadoresVoley = $this->model->GetJugadores();
            $posiciones = $this->model->GetPosiciones();
            $this->indoorView->ShowIndoor($jugadoresVoley,$posiciones,$this->session);
        }

        function Home(){
           $this->homeView->ShowHome($this->session);
        }

        function EliminarJugador($params = null){
            if ($this->session->validSession() && $this->session->isAdmin()){
                $id= $params[':ID'];
                $this->model->EliminarJugador($id);
                $this->indoorView->ShowIndoorLocation();
            }
            else{
                $this->login->showLogin("Se requiere permisos");
            }
        }

        function DetalleJugador($params = null){
            $id = $params[':ID'];
            $jugador = $this->model->GetJugador($id);
            $posiciones = $this->model->GetPosiciones();
            $this->indoorView->ShowDetalleJugador($jugador,$posiciones,$this->session);
        }


        function EditarJugador($params=null){
            if ($this->session->validSession() && $this->session->isAdmin()){
                $id= $params[':ID'];
                $jugador = $this->model->GetJugador($id);
                $posiciones = $this->model->GetPosiciones();
                $this->indoorView->ShowModificarJugador($jugador,$posiciones,$this->session);
            }
            else{
                //$this->homeView->ShowHome($this->session);
                $this->login->showLogin("Se requiere permisos");
            }
        }
        
        function EditarJugadorConID($params = null){
            if ($this->session->validSession() && $this->session->isAdmin()){
                $id= $params[':ID'];
                $this->model->editarJugador($id,$_POST['numero'],$_POST['selectPosiciones'],$_POST['nombre'],$_POST['edad'],$_POST['altura']);
                
                $this->indoorView->ShowIndoorLocation();
            }
            else{
                $this->login->showLogin("Se requiere permisos");
                //$this->homeView->ShowHome($this->session);
            }
        }

        function AddJugador(){
            if ($this->session->validSession() && $this->session->isAdmin()){
                $posiciones = $this->model->GetPosiciones();
                $this->indoorView->ShowAddJugador($posiciones , $this->session);
            }
            else{
                $this->login->showLogin("Se requiere permisos");
                //$this->homeView->ShowHome($this->session);
            }

        }

        


        function AgregarJugador(){
            if ($this->session->validSession() && $this->session->isAdmin()){
                if( isset($_POST['selectPosiciones']) && isset($_POST['nombre']) 
                    && isset($_POST['edad']) && isset($_POST['numero']) && isset($_POST['altura'])){    

                    $this->model->insertarJugador($_POST['numero'],$_POST['selectPosiciones'],$_POST['nombre'],$_POST['edad'],$_POST['altura']);
                
                }
                $this->indoorView->ShowIndoorLocation();
            }
            else{
                $this->login->showLogin("Se requiere permisos");
                //$this->homeView->ShowHome($this->session);
            }
            
        }

    }
?>