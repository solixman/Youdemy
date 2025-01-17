<?php

class authService
{
    private UserService $userService;
    private Utilisateur $user;
    public function __construct()
    {
        $this->userService = new UserService();
        $this ->user=new Utilisateur();
    }

    // public function __call($name, $arguments){
    //     if($name = )
    // }

    
    public function register(RegisterForm $registerForm){
        $this->validation($registerForm);
        
        $this->user->instance(
            $registerForm->name,
            $registerForm->lName,
            $registerForm->Email,
            $registerForm->password,
            $registerForm->phone,
            $registerForm->photo,
            new Role(),
            []
        );
        $this->user->getRole()->setRoleName("Utilisateur");
        $this->userService -> create($this->user);
        return $this ->user;
    }  




    public function login(LoginForm $SigninForm) {
        $this->user->instance($SigninForm->Email,$SigninForm->password);
        $this->user = $this->userService->findByEmailAndPassword($this->user);
        if ($this ->user->getId() == 0) {
            throw new Exception("Email ou le mot de passe incorrect");
        }
        return $this ->user;
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

    


