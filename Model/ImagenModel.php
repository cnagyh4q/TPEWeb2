<?php

class ImagenModel{

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_volley;charset=utf8', 'root', '');
    }

    //id imagen
    function eliminarImagen($id){
        $sentencia = $this->db->prepare("DELETE FROM imagen WHERE id=?");
        $sentencia->execute(array($id));
    }


  
    //el id corresponde a el id de jugador
    function getImagenByJugadorid($id){
        $sentencia = $this->db->prepare("SELECT * FROM imagen WHERE id_jugador=? ");
        $sentencia->execute(array($id));
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

  
    function insertarImagen($path, $id_jugador , $detalle ){       
        $sentencia = $this->db->prepare("INSERT INTO imagen(path , id_jugador , detalle) VALUES (? , ? ,?)");
        $sentencia->execute(array($path,$id_jugador ,$detalle ));
        return $this->db->lastInsertId();
    }

    


}