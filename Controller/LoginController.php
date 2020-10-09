<?php


require_once "./View/LoginView.php";
require_once "./Model/UserModel.php";

 class LoginController {

    private  $view;
    private  $model;    

    function __construct (){
        $this->view = new LoginView();
        $this->model = new UserModel();
    }

    function Login(){
        $this->view->showLogin();
   
    } 
    function Logout(){
        session_start();
        session_destroy();
        header("Location: ".LOGIN);

    }

    function Encriptar(){

        $clave = "1258963";  
        $clave_encriptada = password_hash ($clave , PASSWORD_DEFAULT );  
        echo "La clave $clave encriptada es la siguiente: $clave_encriptada";
    
    }

    function VerificarUsuario (){
        
        $user = $_POST["email"];
        $pass = $_POST["password"];

        if(isset($user)){
            $userDB = $this->model->GetUser($user);

            if(isset($userDB) && $userDB){
                // si  existe el usuario entra..

                if (password_verify($pass, $userDB->password)){

                    session_start();
                    $_SESSION["EMAIL"] = $userDB->email;
                    $_SESSION['LAST_ACTIVITY'] = time();
                    echo "rompe";
                    header("Location: ".BASE_URL."home");
                    $this->view->ShowHome();
                }else{
                    $this->view->ShowLogin("Contraseña incorrecta");
                }

            }else{
                // No existe el user en la DB
                $this->view->ShowLogin("El usuario no existe");
            }
        }

    }


   
 }

?>