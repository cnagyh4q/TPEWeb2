<?php

class ComentarioModel{

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_volley;charset=utf8', 'root', '');
    }

    function eliminarComentario($id){
        $sentencia = $this->db->prepare("DELETE FROM comentario WHERE id=?");
        $sentencia->execute(array($id));
    }

    function getComentarios(){
        $sentencia = $this->db->prepare("SELECT * FROM comentario");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    //el id corresponde a el id de jugador
    function getComenariosByJugadorid($id){
        $sentencia = $this->db->prepare("SELECT c.* , u.nombre as nombreUsario FROM comentario as c join usuario as u on c.id_usuario= u.id WHERE c.id_jugador=? ");
        $sentencia->execute(array($id));
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

  
    function insertarComenatrio($comentario, $id_jugador , $id_usuario , $puntaje){
       
        $sentencia = $this->db->prepare("INSERT INTO comentario(id_usuario , id_jugador , puntaje , comentario) VALUES (? , ? ,? ,?)");
        $sentencia->execute(array($id_usuario,$id_jugador ,$puntaje , $comentario ));
    }

    


}
