<?php

class PosicionesModel{

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_volley;charset=utf8', 'root', '');
    }

    function eliminarPosicion($id){
        $sentencia = $this->db->prepare("DELETE FROM posicion WHERE id=?");
        $sentencia->execute(array($id));
    }

    function getPosiciones(){
        $sentencia = $this->db->prepare("SELECT * FROM posicion");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    function getPosicion($id){
        $sentencia = $this->db->prepare("SELECT * FROM posicion WHERE id=? ");
        $sentencia->execute(array($id));
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    function editarPosicion($id,$nombre){
        $sentencia = $this->db->prepare("UPDATE posicion SET nombre=? WHERE id=? ");
        $sentencia->execute(array($nombre,$id));
        
    }

    

    function getJugadoresByPosicionId($id){
        $sentencia = $this->db->prepare("SELECT p.nombre as posicion , j.nombre , j.numero FROM posicion as p RIGHT JOIN jugador as j on j.id_posicion = p.id where p.id = ?");
        $sentencia->execute(array($id));
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    function insertarPosicion($nombre){
       
        $sentencia = $this->db->prepare("INSERT INTO posicion(nombre) VALUES (?)");
        $sentencia->execute(array($nombre));
    }

    


}

?>