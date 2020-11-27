<?php

require_once "./Model/ComentarioModel.php";
require_once "ComentarioView.php";
require_once "./Controller/Session.php";
require_once "./Model/UserModel.php";

class ComentarioController
{

    private $model;
    private $userModel;
    private $view;
    private $session;
    private $data;

    function __construct()
    {
        $this->view = new ComentarioView();
        $this->userModel = new UserModel();
        $this->model = new ComentarioModel();
        $this->session = new Session();
        $this->data = file_get_contents("php://input");
    }

    function getData()
    {
        return json_decode($this->data);
    }


    function getComentarios($params = null)
    {
        //revisar usuario logueado
        if (isset($params[':ID']) && !empty($params[':ID'])) {
            $comentarios = $this->model->getComenariosByJugadorid($params[':ID']);
        } else {
            $comentarios = $this->model->getComentarios();
        }
        $comentarios ? $this->view->response($comentarios, 200) : $this->view->response([], 200);
    }


    function agregarComentarios($params = null)
    {

        if (isset($params[':ID']) && !empty($params[':ID'])) {
            if ($this->session->validSession()) {
                $body = $this->getData();
                $email = $this->session->getEmail();
                $user = $this->userModel->getUser($email);
                $comentario_id = $this->model->insertarComenatrio($body->comentario, $params[':ID'], $user->id, $body->puntaje);
                if ($comentario_id) {
                    return $this->view->response($this->model->getComentarioById($comentario_id), 200);
                } else {
                    return $this->view->response("error", 404);
                }
            }
        }
        return $this->view->response("error", 404);
    }


    function deletComentarios($params = null)
    {
        if (isset($params[':ID']) && !empty($params[':ID'])) {
            if ($this->session->validSession() && $this->session->isAdmin()) {
                $this->model->eliminarComentario($params[':ID']);
                return $this->view->response($params[':ID'], 200);
            }
        }
        return $this->view->response("error", 404);
    }   
}
