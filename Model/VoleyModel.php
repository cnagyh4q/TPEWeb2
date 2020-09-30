<?php

    class VoleyModel{

        private $db;

        function __construct(){
            $this->db = new PDO('mysql:host=localhost;'.'dbname=db_volley;charset=utf8', 'root', '');
        }

        function GetJugadores(){
            $sentencia = $this->db->prepare("SELECT * FROM jugador");
            $sentencia->execute();
            return $sentencia->fetchAll(PDO::FETCH_OBJ);
        }

        function GetPosiciones(){
            $sentencia = $this->db->prepare("SELECT * FROM posicion");
            $sentencia->execute();
            return $sentencia->fetchAll(PDO::FETCH_OBJ);
        }

        function EditarJugador($id){
            
        }
        function insertarJugador($numero,$posicion,$nombre,$edad,$altura){
           
            $sentencia = $this->db->prepare("INSERT INTO jugador(numero,id_posicion,nombre,edad,altura,id_equipo) VALUES (?,?,?,?,?,?)");
            $sentencia->execute(array($numero,$posicion,$nombre,$edad,$altura,"1"));
        }
    }

?>