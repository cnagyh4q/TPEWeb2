<?php
    require_once 'Controller/VoleyController.php';
    require_once 'Controller/LoginController.php';
    require_once 'Controller/PosicionesController.php';
    require_once 'RouterClass.php';
    
    // CONSTANTES PARA RUTEO
    define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

    $r = new Router();

    $r->addRoute("home", "GET", "VoleyController", "home");

    $r->addRoute("indoor", "GET", "VoleyController", "indoor");
   
    
    $r->addRoute("agregarJ","GET","VoleyController","addJugador");
    $r->addRoute("agregar","POST","VoleyController","agregarJugador");

    
    $r->addRoute("editar/:ID","GET","VoleyController","editarJugador");
    $r->addRoute("editarID/:ID","POST","VoleyController","editarJugadorConID");


    $r->addRoute("eliminar/:ID","GET","VoleyController","eliminarJugador");
       
    $r->addRoute("detalle/:ID","GET","VoleyController","detalleJugador");


    $r->addRoute("login","GET","LoginController","login");
    $r->addRoute("logout","GET","LoginController","logout");
    $r->addRoute("login","POST","LoginController","verificarUsuario");

   
    $r->addRoute("editarPosiciones","GET","PosicionesController","panelEdicionPos");
    

    $r->addRoute("agregarPosicion","GET","PosicionesController","agregarPosicion");
    $r->addRoute("agregarPosicion","POST","PosicionesController","agregarPosicionDB");

    
    $r->addRoute("editarPosicion/:ID","GET","PosicionesController","editarPosicion");
    $r->addRoute("editarPosicion/:ID","POST","PosicionesController","editarPosicionDB");

    $r->addRoute("eliminarPosicion/:ID","GET","PosicionesController","eliminarPosicionDB");
    
    
    //$r->addRoute("encriptar","GET","LoginController","encriptar");
    
     

    //Ruta por defecto.
    $r->setDefaultRoute("VoleyController", "home");

    $r->route($_GET['action'], $_SERVER['REQUEST_METHOD']);
