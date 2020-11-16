<?php

require_once "ComentarioModel.php";
require_once "ComentarioView.php";

class ComentarioController
{

    private $model;
    private $view;

    function __construct()
    {
        $this->view = new ComentarioView();

        $this->model = new ComentarioModel();
    }


    function getComentarios($params = null)
    {
       
            //revisar usuario logueado
        if (isset($params[':ID']) && !empty($params[':ID'])) {
               
                $comentarios = $this->model->getComenariosByJugadorid($params[':ID']);
            }
        else {
         
            $comentarios = $this->model->getComentarios();
        }
        $comentarios ? $this->view->response($comentarios, 200) : $this->view->response([], 200) ;

        
    }
}
