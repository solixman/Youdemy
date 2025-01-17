<?php

class authService
{
    private UserService $userService;

    public function __construct()
    {
        $this->userService = new UserService();
    }

    // public function __call($name, $arguments){
    //     if($name = )
    // }

    
    public function register(RegisterForm $registerForm){
        $this->validation($registerForm);
        $user = new Utilisateur();
        $user->instance(
            $registerForm->name,
            $registerForm->lName,
            $registerForm->Email,
            $registerForm->password,
            $registerForm->phone,
            $registerForm->photo,
            new Role(),
            []
        );
        $user->getRole()->setRoleName("Utilisateur");
        $this->userService -> create($user);
        return $user;
    }  




    public function login(LoginForm $SigninForm) {
        
        $this->validation($SigninForm);
     
        $user = new  Utilisateur();
        $user->instance( $SigninForm->Email,$SigninForm->password);

        // var_dump($user);
        $user =  $this->userService->findByEmailAndPassword($user);

        if ($user->getId() == 0) {
            throw new Exception("Email ou le mot de passe incorrect");
        }

        return $user;
    }



    private function validation($forms) {
       
        foreach ($forms as $key => $value) {
       
            if (!$this->validationString($value)) {
                throw new Exception($key . " is not valide ");
            }
        }
        if (isset($forms->password) && isset($forms->passwordConfirmation)) {
            $this->passwordValidation($forms->password, $forms->passwordConfirmation);
        } 
    }

 

 private function validationString(string $string){
          
            if (empty($string) || $string == null || is_null($string)) {
                return false;
            }
    
            return true;
        }

        
    public function passwordValidation(string $password, string $passwordConfirmation) {
        
        if ($password != $passwordConfirmation) {
            throw new Exception("les mots de passe sont pas les mêmes");
        }

        return true;
    }


}

    


