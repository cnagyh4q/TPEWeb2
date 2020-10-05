<?php   

    require_once "./View/HomeView.php";
    require_once "./View/IndoorView.php";
    require_once "./Model/VoleyModel.php";

    class VoleyController{

        private $homeView;
        private $indoorView;
        private $model;

        function __construct (){
            $this->indoorView = new IndoorView();
            $this->homeView = new HomeView();
            $this->model = new VoleyModel();
        }

        function Indoor(){
            $jugadoresVoley = $this->model->GetJugadores();
            $posiciones = $this->model->GetPosiciones();
            $this->indoorView->ShowIndoor($jugadoresVoley,$posiciones);
        }

        function Home(){
           $this->homeView->ShowHome();
        }

        function EliminarJugador($params = null){
            $id= $params[':ID'];
            $this->model->EliminarJugador($id);
            $this->indoorView->ShowIndoorLocation();
        }

        function DetalleJugador($params = null){
            $id = $params[':ID'];
            //$this->model->DetalleJugador($id);
            $jugador = $this->model->GetJugador($id);
            $posiciones = $this->model->GetPosiciones();
            $this->indoorView->ShowDetalleJugador($jugador,$posiciones);
        }


        function EditarJugador($params=null){
            //cunsulta base de datos
            $id= $params[':ID'];
            $jugador = $this->model->GetJugador($id);
            $posiciones = $this->model->GetPosiciones();
            $this->indoorView->ShowModificarJugador($jugador,$posiciones);
        
        }
        
        function EditarJugadorConID($params = null){
            $id= $params[':ID'];
            $this->model->editarJugador($id,$_POST['numero'],$_POST['selectPosiciones'],$_POST['nombre'],$_POST['edad'],$_POST['altura']);
            
            $this->indoorView->ShowIndoorLocation();
        }

        function AddJugador(){
            //$jugadoresVoley = $this->model->GetJugadores();
            $posiciones = $this->model->GetPosiciones();
            //$accion = "agregar";
             $this->indoorView->ShowAddJugador($posiciones);

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