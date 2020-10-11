<?php


class Session
{


    private $timeOut = 360000;


    

    public function __construct($email = null, $rol = null)
    {
        session_start();


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


    function isAdmin(){

        if (isset($_SESSION["ROL"]) && $_SESSION["ROL"] == "Admin"){
            return true;
        }
        return false;
    }


}
