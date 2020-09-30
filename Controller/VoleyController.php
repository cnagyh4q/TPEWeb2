<?php   

    require_once "./View/HomeView.php";
    require_once "./View/IndoorView.php";
    require_once "./Model/VoleyModel.php";

    class VoleyController{

        private $homeView;
        private $indoorView;
        private $model;
        private $accion;

        function __construct (){
            $this->indoorView = new IndoorView();
            $this->homeView = new HomeView();
            $this->model = new VoleyModel();
            $this->accion = "agregar";
        }

        function Indoor($accio=null){
            
            $jugadoresVoley = $this->model->GetJugadores();
            $posiciones = $this->model->GetPosiciones();
            if (is_null($accio)){
                
                echo("es null");
                $this->indoorView->ShowIndoor($jugadoresVoley,$posiciones,"agregar");
                //$this->indoorView->ShowIndoorLocation();
            }
            else{
                $this->accion = $accio;
                echo($this->accion);
                echo("hola");
                $this->indoorView->ShowIndoor($jugadoresVoley,$posiciones,$accio);
               // $this->indoorView->ShowIndoorLocation();
                
            }
        }

        function Home(){
           $this->homeView->ShowHome();
        }


        function EditarJugador($params = null){
            
            $accion = "editar";
            $jugador_id = $params[':ID'];

            $this->model->EditarJugador($jugador_id);
            
           
            //$this->indoorView->ShowIndoor($jugadoresVoley,$posiciones,$accion);
            //$this->indoorView->ShowIndoorLocation();
            //$this->Indoor($accion);
        }

        function AgregarJugador(){

            //echo ($_POST['numero'] . $_POST['posicion']);
            // Falta validar
            //var_dump($_POST['selectPosiciones']);
            if( isset($_POST['selectPosiciones']) && isset($_POST['nombre']) 
            && isset($_POST['edad']) && isset($_POST['numero']) && isset($_POST['altura'])){
             
            //var_dump(array($_POST['numero'],$_POST['posicion'],$_POST['nombre'],$_POST['edad'],$_POST['altura']));
            

            $this->model->insertarJugador($_POST['numero'],$_POST['selectPosiciones'],$_POST['nombre'],$_POST['edad'],$_POST['altura']);
            
            }
            $this->indoorView->ShowIndoorLocation();
        }

    }

?>