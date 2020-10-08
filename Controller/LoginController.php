<?php


require_once "./View/LoginView.php";

 class LoginController {

    private  $view;

    function __construct (){
        $this->view = new LoginView();
    }

    function Login(){
        $this->view->showLogin();
   
    } 


   
 }

?>