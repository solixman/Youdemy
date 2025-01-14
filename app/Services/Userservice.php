<?php


class UserService{
    private Utilisateur $user;
    // private UserRepository $userRepository;
    private RoleService $roleService;

    public function __construct() {
        // $this->userRepository = new UserRepository();
        // $this->roleService = new RoleService();
    }

    public function create($user){
    

        $user->setRole($this->roleService
        ->getRoleByName($user
        ->getRole()
        ->getRoleName()));
    }
    
}

?>