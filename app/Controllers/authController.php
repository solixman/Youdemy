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
             $user = $this->authService->register($registerForm);
            //  var_dump($user);
            
        }catch (Exception $e) {
             echo"error:".$e;
        } 
        // return $user;
        header('location: /dashboard');
     }


   //login method

     public function login(LoginForm $logInForm) {
 
        try {
            $user = $this->authService->login($logInForm);
        } catch (Exception $e) {
            echo"error!:".$e;
        }
        header('location: /dashboard');
    } 
   
}

?>