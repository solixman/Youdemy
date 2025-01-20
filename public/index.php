<?php
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


switch ($path) {
    case '/login':

        if ($method == 'get')
        {
            include('../utils/login-form-v16/Login_v16/login.html');
        }
        if($method =='post'){
            $loginform= new LoginForm();
            $loginform->setEmail($_REQUEST['email']);
            $loginform->setPassword($_REQUEST['password']);
            // var_dump($loginform);
            // die();
        (new authController)->login($loginform);
        }
        break;
        case '/dashboard':

        break;
        case'/register':
            if ($method == 'get')
            {
               include('../utils/login-form-v16/Login_v16/register.html');
            }
            if($method =='post'){
                $registerform= new RegisterForm();
                $registerform->instance($_REQUEST['name'],$_REQUEST['lName'],$_REQUEST['Email'],$_REQUEST['password'],$_REQUEST['passwordConfirmation']);
                // var_dump($registerform);
                // die();
            (new authController)->register($registerform);
            }
            
        break;

    }
