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



    }

?>