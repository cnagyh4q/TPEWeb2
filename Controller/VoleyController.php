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

        function EditarJugador(){
            $this->homeView->ShowFooter();
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