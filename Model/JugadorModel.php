  
<?php

class JugadorModel{

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_volley;charset=utf8', 'root', '');
    }

    function getJugadores(){
        $sentencia = $this->db->prepare("SELECT * FROM jugador ORDER BY numero"   );
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }
    
    function getJugador($id){
        $sentencia = $this->db->prepare("SELECT * FROM jugador WHERE id=? ");
        $sentencia->execute(array($id));
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    function eliminarJugador($id){
        $sentencia = $this->db->prepare("DELETE FROM jugador WHERE id=?");
        $sentencia->execute(array($id));
    }

    function getPosiciones(){
        $sentencia = $this->db->prepare("SELECT * FROM posicion");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    function insertarJugador($numero,$posicion,$nombre,$edad,$altura){
       
        $sentencia = $this->db->prepare("INSERT INTO jugador(numero,id_posicion,nombre,edad,altura) VALUES (?,?,?,?,?)");
        $sentencia->execute(array($numero,$posicion,$nombre,$edad,$altura));
    }

    function editarJugador($id,$numero,$posicion,$nombre,$edad,$altura){
        
        $sentencia = $this->db->prepare("UPDATE jugador SET numero=? , id_posicion= ? , nombre=? , edad=? , altura=?  WHERE id=? ");
        $sentencia->execute(array($numero,$posicion,$nombre,$edad,$altura,$id));
        
    }
}

?>