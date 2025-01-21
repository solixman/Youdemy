 <?php
 include_once('../app/Models/roles.php');
include_once('../app/core/Database.php');
include_once('../app/Repositories/Respositorie.php');
include_once('./../app/http/LogInForm.php');
include_once('./../app/http/registerform.php');
include_once('./../app/Services/authService.php');
include_once('../app/Controllers/authController.php');
include_once('../app/Services/Userservice.php');
include_once('../app/Repositories/RoleRespositorie.php');
include_once('../app/DAOs/DAO.php');
include_once('../app/Services/RoleService.php');
include_once('../app/Models/Utilisateurs.php');
include_once('../app/Repositories/UserRepository.php');



$path = $_SERVER['REQUEST_URI'];
$method = strtolower($_SERVER['REQUEST_METHOD']);
// var_dump($path);
// die;


switch ($path) {
    case '/login':

        if ($method == 'get')
        {
            // echo('in /login (get method)');
            include('../utils/login-form-v16/Login_v16/login.html');            
        }
        if($method =='post'){
            // echo('in /login (post method)');
            
            $authcontroller = new authController();
            $loginform= new LoginForm();
            $loginform->setEmail($_REQUEST['Email']);
            $loginform->setPassword($_REQUEST['password']);
        
            $authcontroller->login($loginform);
        }
        break;
        case '/dashboard':

            echo('you are in the dashboard');


        break;
        case'/register':
            if ($method == 'get')
            {
                // echo('in /register (get method)');
               include('../utils/login-form-v16/Login_v16/register.html');
            }
            if($method =='post'){
                // echo('in /register (post method)');
                $authcontroller = new authController();
                $registerform = new RegisterForm();
                $registerform->instance($_REQUEST['name'],$_REQUEST['lName'],$_REQUEST['Email'],$_REQUEST['password'],$_REQUEST['passwordConfirmation'],$_REQUEST['rolename']);
                
                $authcontroller ->register($registerform);
            }
            
        break;

    } 
