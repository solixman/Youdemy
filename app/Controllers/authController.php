<?php
// include("/../http/registerform.php");
// include("/../http/signInForm.php");
class authController{
    private AuthService $authService;

    public function __construct() {
        $this->authService = new AuthService();
    }

    //register method

    public function register(RegisterForm $registerForm) {
        try {
            $this->authService->register($registerForm);
            //  var_dump($user);
            header('location: /dashboard');
        }catch (Exception $e) {
             header('location: /register');
             echo"error:".$e;

        } 
        // return $user;
        
     }


   //login method

     public function login(LoginForm $logInForm) {
 
        try {
            $this->authService->login($logInForm);
            header('location: /dashboard');
        } catch (Exception $e) {
            echo"error!:".$e;
            header('location: /login');
        }
        
    } 
   
}

?>