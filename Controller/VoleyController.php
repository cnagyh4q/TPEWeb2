<?php   

    require_once "./View/HomeView.php";
    require_once "./View/IndoorView.php";
    require_once "./Model/JugadorModel.php";
    require_once "./Model/PosicionesModel.php";
    require_once "./Controller/Session.php";

    class VoleyController{

        private $homeView;
        private $indoorView;
        private $model;
        private $modelposicion;
        private $session;
        private $login;
        private $default;

        function __construct (){
            $this->indoorView = new IndoorView();
            $this->homeView = new HomeView();
            $this->model = new JugadorModel();
            $this->session = new Session();
            $this->login = new LoginView();
            $this->modelposicion= new PosicionesModel();
            $this->default= 2;
        }

        function indoor(){        
           
            
            if ( isset($_GET['pag'])  && isset($_GET['cant']) && !empty($_GET['cant']) && !empty($_GET['pag']) ){
                $paginaLimpia =   $_GET['pag'];  
                $cantMostrar = $_GET['cant'];
                $jugadoresVoley = $this->model->getJugadores();
                $cantidadTotal = count($jugadoresVoley);

                if ($paginaLimpia<1  || $cantMostrar <1 ){
                    $paginaLimpia=1;
                    $cantMostrar= $this->default;
                    $totalPaginas=1;
                    header("Location: ".BASE_URL."indoor/?pag=1&cant=".$this->default);
                }
                else{
                    if ($cantMostrar>$cantidadTotal  ){
                        $totalPaginas=1;
                    }
                    else{
                        $totalPaginas = ceil($cantidadTotal/$cantMostrar);
                    }
                }    
                $nroPag = ($paginaLimpia - 1) * $cantMostrar;                
                $jugadoresVoley = $this->model->getJugadoresPaginacion($nroPag,$cantMostrar);

                $posiciones = $this->modelposicion->getPosiciones();
                $this->indoorView->showIndoor($jugadoresVoley,$posiciones,$this->session,$paginaLimpia,$cantMostrar,$totalPaginas);
            
            }
            else {
                    header("Location: ".BASE_URL."indoor/?pag=1&cant=".$this->default);
            }
            
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
            $this->indoorView->showDetalleJugador($jugador,$this->session);
        }


        function editarJugador($params=null){
            if ($this->session->validSession() && $this->session->isAdmin()){
                $id= $params[':ID'];
                $jugador = $this->model->getJugador($id);
                $posiciones = $this->modelposicion->getPosiciones();
                $this->indoorView->showModificarJugador($jugador,$posiciones,$this->session);
            }
            else{
                $this->login->showLogin("Se requiere permisos");
            }
        }
        
        function editarJugadorConID($params = null){
            if ($this->session->validSession() && $this->session->isAdmin()){
                $id= $params[':ID'];
                if( isset($_POST['selectPosiciones']) && isset($_POST['nombre']) 
                    && isset($_POST['edad']) && isset($_POST['numero']) && isset($_POST['altura'])){ 
                $this->model->editarJugador($id,$_POST['numero'],$_POST['selectPosiciones'],$_POST['nombre'],$_POST['edad'],$_POST['altura']);
                }
                $this->indoorView->showIndoorLocation();
            }
            else{
                $this->login->showLogin("Se requiere permisos");
            }
        }

        function addJugador(){
            if ($this->session->validSession() && $this->session->isAdmin()){
                $posiciones = $this->modelposicion->getPosiciones();
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
