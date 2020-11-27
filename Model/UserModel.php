<?php

class UserModel{

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_volley;charset=utf8', 'root', '');
    }
     
    function getUser($user){
        $sentencia = $this->db->prepare("SELECT * FROM usuario as u join rol as r on u.id_rol = r.id WHERE email=?" );
        $sentencia->execute(array($user));
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    function getAllUsers(){
        $sentencia = $this->db->prepare("SELECT u.*,r.permiso  FROM usuario as u join rol as r on u.id_rol = r.id " );
        $sentencia->execute(array());
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }
    
    function editarRolUsuario ($id , $rol){
        $sentencia = $this->db->prepare("UPDATE usuario SET id_rol=? WHERE id=? ");
        return $sentencia->execute(array($rol,$id));
        
    }

    function deleteUsuario($id){
        $sentencia = $this->db->prepare("DELETE FROM usuario WHERE id=?");
        return $sentencia->execute(array($id));
    }

    function addUser($nombre , $user , $pass , $rol="2"){        
        $sentencia = $this->db->prepare("INSERT INTO usuario(nombre, email , password , id_rol ) values (?,?,?,?)");
        $sentencia->execute(array($nombre,$user,$pass,$rol));
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }
}

?>