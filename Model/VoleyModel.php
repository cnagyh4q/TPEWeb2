  
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
    
    function GetJugador($id){
        $sentencia = $this->db->prepare("SELECT * FROM jugador WHERE id=? ");
        $sentencia->execute(array($id));
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    function EliminarJugador($id){
        $sentencia = $this->db->prepare("DELETE FROM jugador WHERE id=?");
        $sentencia->execute(array($id));
    }
    function GetPosiciones(){
        $sentencia = $this->db->prepare("SELECT * FROM posicion");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    function insertarJugador($numero,$posicion,$nombre,$edad,$altura){
       
        $sentencia = $this->db->prepare("INSERT INTO jugador(numero,id_posicion,nombre,edad,altura,id_equipo) VALUES (?,?,?,?,?,?)");
        $sentencia->execute(array($numero,$posicion,$nombre,$edad,$altura,"1"));
    }

    function editarJugador($id,$numero,$posicion,$nombre,$edad,$altura){
                                        //"UPDATE tarea SET Finalizada=1." WHERE idTarea=?"
                                       // UPDATE empleado SET nombre = ?, email = ?, telefono = ? WHERE id_empleado = ?
        $sentencia = $this->db->prepare("UPDATE jugador SET numero=? , id_posicion= ? , nombre=? , edad=? , altura=? , id_equipo=? WHERE id=? ");
        $sentencia->execute(array($numero,$posicion,$nombre,$edad,$altura,"1",$id));
        
    }
}

?>