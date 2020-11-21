<?php

    require_once 'RouterClass.php';

    require_once './api/ComentarioController.php';

    
    // CONSTANTES PARA RUTEO
    //define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

    $r = new Router();

    //todos los comentarios para todos los jugadroes
    $r->addRoute("comentarios/","GET","ComentarioController","getComentarios");
    
    //todos los comentarios para un los jugadroes
    $r->addRoute("comentarios/:ID","GET","ComentarioController","getComentarios");


    //Elimina un comentario por id comentario
    $r->addRoute("comentarios/:ID","DELETE","ComentarioController","deletComentarios");


    //Agrega un comentario
    $r->addRoute("comentarios/:ID","POST","ComentarioController","agregarComentarios");
   
    
   

    //Ruta por defecto.
    //$r->setDefaultRoute("VoleyController", "home");

    $r->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);
