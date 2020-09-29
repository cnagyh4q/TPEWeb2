<?php
    require_once 'Controller/VoleyController.php';
    require_once 'RouterClass.php';
    
    // CONSTANTES PARA RUTEO
    define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

    $r = new Router();

    $r->addRoute("home", "GET", "VoleyController", "Home");

    $r->addRoute("indoor", "GET", "VoleyController", "Indoor");
   
    $r->addRoute("agregar","POST","VoleyController","AgregarJugador");

    $r->addRoute("edit","POST","VoleyController","EditarJugador");


    /*
    // rutas
    $r->addRoute("home", "GET", "TasksController", "Home");
    $r->addRoute("mermelada", "GET", "TasksController", "Home");

    //Esto lo veo en TasksView
    $r->addRoute("insert", "POST", "TasksController", "InsertTask");

    $r->addRoute("delete/:ID", "GET", "TasksController", "BorrarLaTaskQueVienePorParametro");
    $r->addRoute("completar/:ID", "GET", "TasksController", "MarkAsCompletedTask");
    $r->addRoute("edit/:ID", "GET", "TasksController", "EditTask");
    */
    //Ruta por defecto.
    $r->setDefaultRoute("VoleyController", "Home");

    //Advance
    //$r->addRoute("autocompletar", "GET", "TasksAdvanceController", "AutoCompletar");
    
    //run
    $r->route($_GET['action'], $_SERVER['REQUEST_METHOD']); 
    

?>