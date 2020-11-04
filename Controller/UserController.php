<?php   

require_once "./View/HomeView.php";
require_once "./View/RegistroView.php";
require_once "./Model/UserModel.php";
require_once "./Model/RolModel.php";
require_once "./Controller/Session.php";
require_once "./View/UserView.php";



class UserController {

    private  $view;
    private  $viewHome;
    private  $modelUser;
    private  $modelRol;
    private  $session;    

    function __construct (){
        $this->view = new UserView();
        $this->viewHome = new HomeView();
        $this->modelUser = new UserModel();
        $this->modelRol = new RolModel();
        $this->session = new Session(); 
    }

    function registrarUsuario(){
        $this->view->showRegistro();
   
    } 

    function showUsuarios(){
        $usuarios = $this->modelUser->getAllUsers();
        $this->view->showUsuarios($usuarios,$this->session);
   
    }
    
    function editUsuario($params ){
        $id = $params[':ID'];
        $rol = $this->modelRol->getRolById($_POST['selectRoles']);
        if ( isset($rol) && !empty($rol) ){   
            $this->modelUser->editarRolUsuario($id,$rol->id);
            $this->showUsuarios();
        }
        else
            {echo ("error");}
                //  Mostratar Error 
    } 

    function deleteUsuario($params){
        $id = $params[':ID'];
        if ( isset($id) && !empty($id) ){ 
            var_dump($id);  
            $this->modelUser->deleteUsuario($id);
            $this->showUsuarios();
        }
        else    
            $this->showUsuarios("error");
    }

    function showEditUsuario($params = null){
        $id = $params[':ID'];
        $usuarios = $this->modelUser->getAllUsers();
        $roles = $this->modelRol->getAllRols();
        $this->view->showUsuarios($usuarios,$this->session,$roles,$id);
   
    }  

} 

?>