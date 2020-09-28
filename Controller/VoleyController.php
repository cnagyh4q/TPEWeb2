<?php   

    require_once "./View/VoleyView.php";
    require_once "./Model/VoleyModel.php";

    class VoleyController{

        private $view;
        private $model;

        function __construct (){
            $this->view = new VoleyView();
            $this->model = new VoleyModel();
        }

        function Home(){
            $jugadoresVoley = $this->model->GetJugadores();
            $posiciones = $this->model->GetPosiciones();
            $this->view->ShowHome($jugadoresVoley,$posiciones);
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
            $this->Home();
        }

    }

?>