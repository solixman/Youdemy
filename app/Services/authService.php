<?php

class authService
{
    private UserService $userService;
    private Utilisateur $user;
    private RoleService $roleService;
    public function __construct()
    {
        $this->userService = new UserService();
        $this ->user=new Utilisateur();
        $this ->roleService=new RoleService(); 
    }

    // public function __call($name, $arguments){
    //     if($name = )
    // }

    
    public function register(RegisterForm $registerForm){
        $this->validation($registerForm);
        $role= $this->roleService->getRoleByName($registerForm->rolename);
        $this->user->instance(
            $registerForm->name,
            $registerForm->lName,
            $registerForm->Email,
            $registerForm->password,
            '000000000',
            'https://imgs.search.brave.com/9whgZy6FvowddR1urcESjJ6K7jaR_ZPpZCXmUT7Tovk/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly90NC5m/dGNkbi5uZXQvanBn/LzAxLzE5LzMyLzkz/LzM2MF9GXzExOTMy/OTM4N19zVVRiVWRl/eWhrMG51aE53NVdh/RnZPeVFGbXhlcHBq/WC5qcGc',
            $role,
            []
        );
        
        $this ->user->setRoleId($role->getId());
        // $this->user->getRole()->setRoleName($registerForm->rolename);
        // var_dump($this->user);
        // die;
        $this->userService -> create($this->user);
        return $this ->user;
    }  




    public function login(LoginForm $SigninForm) {
        $this->user->instance($SigninForm->Email,$SigninForm->password);
        $user = $this->userService->findByEmailAndPassword($this->user);
        // var_dump($user);
        // die;
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

    


