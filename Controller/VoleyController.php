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
            $this->view->ShowHome($jugadoresVoley);
        }

        function AddJugador(){

            echo ($_POST['numero'] . $_POST['posicion']);
            // Falta validar
            /*if( isset($_POST['posicion']) && isset($_POST['nombre']) 
            && isset($_POST['edad']) && isset($_POST['numero']) && isset($_POST['altura'])){
             */
            var_dump(array($_POST['numero'],$_POST['posicion'],$_POST['nombre'],$_POST['edad'],$_POST['altura']));
            $this->model->insertarJugador($_POST['numero'],$_POST['posicion'],$_POST['nombre'],$_POST['edad'],$_POST['altura']);
            //$this->Home();
            //}
        }

    }

?>