<?php


class UserService{
    private Utilisateur $user;
    private GRepository $GRepository;
    private RoleService $roleService;
    private userRepository $userRepository;
    public function __construct() {
        $this->GRepository = new GRepository();
        $this->roleService = new RoleService();
        $this->user = new Utilisateur(); 
        $this-> userRepository = new userRepository();
    }

public function create($user){
     $tablename='Utilisateurs';
     $params=[
        'name'=>$user->getFirstname(),
        'lName'=>$user->getLastname(),
        'email'=>$user->getEmail(),
        'password'=>$user->getPassword(),
        'phone'=>$user->getPhone(),
        'roleId'=>$user->getRoleId(),
        'photo'=>$user->getPhoto(),
     ];

     $this->GRepository->create($tablename, $params);
                                     
    $user->setRole($this->roleService ->getRoleByName($user->getRole()->getRoleName()));

}

    public function findByEmailAndPassword(Utilisateur $user)   
    {
       $user = $this->userRepository->findByEmailAndPassword($user);
       $user->setRole(
           $this->roleService->getRoleById($user->getRoleId())
       );
       var_dump($user);
       return $user;
   }
}

?>