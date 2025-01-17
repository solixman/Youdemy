<?php
// include("/../http/registerform.php");
// include("/../http/signInForm.php");
class authController{
    private AuthService $authService;

    public function __construct() {
        $this->authService = new AuthService();
    }

    public function register(RegisterForm $registerForm) {
        try {
             $user = $this->authService->register($registerForm);
        }catch (Exception $e) {
             echo"error:".$e;
        }
     }

     public function login(LoginForm $logInForm) {
 
        try {
            $user = $this->authService->login($logInForm);
        } catch (Exception $e) {
            echo"error!:".$e;
        }
        header('location: dashboard');
    }

}

?>