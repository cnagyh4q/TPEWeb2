<?php

// require_once "./View/ImagenView.php";
require_once "./Model/ImagenModel.php";
require_once "./Controller/Session.php";

class ImagenController
{

    private  $model;
    private  $session;
    private  $view;
    private  $login;


    function __construct()
    {
        $this->model = new ImagenModel();
        $this->session = new Session();
        $this->login = new LoginView();
    }






    function agregarImagen($params = null)
    {

        $id =  $params[':ID'];

        if ($this->session->validSession() && $this->session->isAdmin()) {
            $imagenes = $_FILES['imagenes'];
            $descripcion = $_POST['descripcion'];
            if (isset($id) && isset($imagenes) && isset($descripcion) && !empty($descripcion)) {
                for ($i = 0; $i < count($imagenes['name']); $i++) {
                    $type = strtolower(pathinfo($imagenes['name'][$i], PATHINFO_EXTENSION));
                    if ($type == "jpeg" || $type == "jpg" || $type == "png" || $type == "gif") {
                        // uniqueID en true genera id de 23 caracteres
                        $path = "img/" . uniqid("", true) . "." . $type;
                        move_uploaded_file($imagenes["tmp_name"][$i], $path);

                        $this->model->insertarImagen($path, $id, $descripcion);
                    }
                   
                }
                header("Location: " . $_SERVER['HTTP_REFERER']);
            } else {
                echo "Error 404 - datos invalidos";
            }
        } else {
            $this->login->showLogin("Se requiere permisos");
        }
    }



    function eliminarImagen($params = null)
    {
        if ($this->session->validSession() && $this->session->isAdmin()) {
            $id = $params[':ID'];
            $this->model->eliminarImagen($id);
            header("Location: " . $_SERVER['HTTP_REFERER']);
        } else {
            $this->login->showLogin("Se requiere permisos");
        }
    }
}
