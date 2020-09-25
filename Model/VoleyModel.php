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

    }

?>