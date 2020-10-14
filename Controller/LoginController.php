<?php


require_once "./View/LoginView.php";
require_once "./View/HomeView.php";
require_once "./Model/UserModel.php";
require_once "./Controller/Session.php";

 class LoginController {

    private  $view;
    private  $viewHome;
    private  $model;
    private  $session;    

    function __construct (){
        $this->view = new LoginView();
        $this->viewHome = new HomeView();
        $this->model = new UserModel();
        
    }

    function login(){
        $this->view->showLogin();
   
    } 

    function logout(){
        session_start();
        session_destroy();
        $this->viewHome->ShowHomeLocation();
     }

    function encriptar(){
        //1258963
        $clave = "1234";  
        $clave_encriptada = password_hash ($clave , PASSWORD_DEFAULT );  
        echo "La clave $clave encriptada es la siguiente: $clave_encriptada";
    
    }

    function verificarUsuario (){
        
        $user = $_POST["email"];
        $pass = $_POST["password"];

        if(isset($user)){
            $userDB = $this->model->getUser($user);

            if(isset($userDB) && $userDB){
                if (password_verify($pass, $userDB->password)){
                    $this->session = new Session($userDB->email , $userDB->permiso);
                    header("Location: ".BASE_URL."home");
                    $this->viewHome->showHome($this->session);
                }else{
                    
                    $this->view->showLogin("Contraseña incorrecta");
                }

            }else{
                $this->view->showLogin("El usuario no existe");
                
            }
        }

    }

    
   
 }

?>