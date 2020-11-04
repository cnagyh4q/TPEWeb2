<?php

class RolModel{

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_volley;charset=utf8', 'root', '');
    }
     
    

    function getAllRols(){
        $sentencia = $this->db->prepare("SELECT * FROM rol " );
        $sentencia->execute(array());
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }
    
    function getRolById($id){
        $sentencia = $this->db->prepare("SELECT * FROM rol WHERE id=? ");
        $sentencia->execute(array($id));
        return $sentencia->fetch(PDO::FETCH_OBJ);

    }
}

?>