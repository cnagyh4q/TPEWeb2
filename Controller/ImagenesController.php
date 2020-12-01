<?php

     require_once "./View/ImagenView.php";
    require_once "./Model/ImagenModel.php";
    require_once "./Controller/Session.php";

    class ImagenController {

        private  $model;
        private  $session; 
        private  $view;
        private  $login;


        function __construct (){

            $this->model = new ImagenModel();
            $this->posicionesView = new ImagenView();
            $this->session = new Session();
            $this->login = new LoginView();

        }





  
        function agregarImagen($params = null){
            
            $id =  $params[':ID'];

            if ($this->session->validSession() && $this->session->isAdmin()){
                $imagenes = $_FILES['image']);
                $descripcion = $_POST['descripcion']); 
                if(isset($id) && isset($imagenes){    
                        
                        if (count($imagenes)>0){ //True es por q son varias imagenes
                            foreach ( $imagenes in $imagen){
                                $extension = pathinfo($imagen, PATHINFO_EXTENSION);
                                if ($extension == "jpeg" || $extension == "jpg" || $extension == "png" || $extension == "gif" || $extension == "JPG" || $extension == "JPEG"){ 
                                    //$nombre = $imagen['name'][$i]; // nombre de la imagen que sube el usuario
                                    $nomb_temporal = $images['tmp_name'][$i]; // nombre que va a tener en la carpeta temporal     
                                    $imagen = $this->traspaso($nombre, $nomb_temporal); // mover imagen a la carpeta temporal
                                    
                                    
                                    $this->model->agregarImagen($imagen,$id,$descripcion);
                            }
                        }
                        else{
                            $this->model->agregarImagen($imagenes,$id,$descripcion);
                        }
                    }
                    header("Location: " . $_SERVER['HTTP_REFERER']);
            }
            else{
                $this->login->showLogin("Se requiere permisos");
            }         
        }

        function traspasoImagen($nombre, $temporal){
            $filePath = "img/" . uniqid("", true) . ".". strtolower(pathinfo($nombre, PATHINFO_EXTENSION));
            move_uploaded_file($temporal, $filepath); // mover el archivo a la ubicación -> a images con el nombre temporal generado
            return $filepath; // devuelve la ruta final de la imagen
        }

       
        function eliminarImagen($params = null){
            if ($this->session->validSession() && $this->session->isAdmin()){
                $id= $params[':ID'];
                $this->model->eliminarImagen($id);
                header("Location: " . $_SERVER['HTTP_REFERER']);
            }
            else{
                $this->login->showLogin("Se requiere permisos");
            }
        }


        
    
    }

?>