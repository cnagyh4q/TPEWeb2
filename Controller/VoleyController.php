<?php   

    require_once "./View/HomeView.php";
    require_once "./View/IndoorView.php";
    require_once "./Model/JugadorModel.php";
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
            $this->model = new JugadorModel();
            $this->session = new Session();
            $this->login = new LoginView();
        }

        function indoor(){
            $jugadoresVoley = $this->model->getJugadores();
            $posiciones = $this->model->getPosiciones();
            $this->indoorView->showIndoor($jugadoresVoley,$posiciones,$this->session);
        }

        function home(){
           $this->homeView->showHome($this->session);
        }

        function eliminarJugador($params = null){
            if ($this->session->validSession() && $this->session->isAdmin()){
                $id= $params[':ID'];
                $this->model->eliminarJugador($id);
                $this->indoorView->showIndoorLocation();
            }
            else{
                $this->login->showLogin("Se requiere permisos");
            }
        }

        function detalleJugador($params = null){
            $id = $params[':ID'];
            $jugador = $this->model->getJugador($id);
            $posiciones = $this->model->getPosiciones();
            $this->indoorView->showDetalleJugador($jugador,$posiciones,$this->session);
        }


        function editarJugador($params=null){
            if ($this->session->validSession() && $this->session->isAdmin()){
                $id= $params[':ID'];
                $jugador = $this->model->GetJugador($id);
                $posiciones = $this->model->GetPosiciones();
                $this->indoorView->showModificarJugador($jugador,$posiciones,$this->session);
            }
            else{
                $this->login->showLogin("Se requiere permisos");
            }
        }
        
        function editarJugadorConID($params = null){
            if ($this->session->validSession() && $this->session->isAdmin()){
                $id= $params[':ID'];
                $this->model->editarJugador($id,$_POST['numero'],$_POST['selectPosiciones'],$_POST['nombre'],$_POST['edad'],$_POST['altura']);
                
                $this->indoorView->showIndoorLocation();
            }
            else{
                $this->login->showLogin("Se requiere permisos");
            }
        }

        function addJugador(){
            if ($this->session->validSession() && $this->session->isAdmin()){
                $posiciones = $this->model->getPosiciones();
                $this->indoorView->showAddJugador($posiciones , $this->session);
            }
            else{
                $this->login->showLogin("Se requiere permisos");
            }

        }

        


        function agregarJugador(){
            if ($this->session->validSession() && $this->session->isAdmin()){
                if( isset($_POST['selectPosiciones']) && isset($_POST['nombre']) 
                    && isset($_POST['edad']) && isset($_POST['numero']) && isset($_POST['altura'])){    

                    $this->model->insertarJugador($_POST['numero'],$_POST['selectPosiciones'],$_POST['nombre'],$_POST['edad'],$_POST['altura']);
                
                }
                $this->indoorView->showIndoorLocation();
            }
            else{
                $this->login->showLogin("Se requiere permisos");
            }
            
        }

    }
?>