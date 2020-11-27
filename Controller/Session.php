<?php


class Session
{


    private $timeOut = 60;   

    public function __construct($email = null, $rol = null )
    {

        if (session_status() != PHP_SESSION_ACTIVE){
            session_start();
        }

        if (isset($email) && isset($rol)) {
            $_SESSION["EMAIL"] = $email;
            $_SESSION["ROL"] = $rol;
            $_SESSION['LAST_ACTIVITY'] = time();
        }
    }


    function validSession()
    {     

        if (!isset($_SESSION["EMAIL"])) {
            return false;
        } else {
            
            if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > $this->timeOut)) {
                session_destroy();
                return false;
            }

            $_SESSION['LAST_ACTIVITY'] = time();
            return true;
        }
    }

    function getEmail(){        
        return $_SESSION["EMAIL"];
    }


    function isAdmin(){

        if (isset($_SESSION["ROL"]) && $_SESSION["ROL"] == "ADMINISTRADOR"){
            return true;
        }
        return false;
    }


}
