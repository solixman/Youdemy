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

public function create(Utilisateur $user){
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
    //     var_dump($user);
    //    die();
       $email = $user->getEmail();
       $password=$user->getPassword();

       $this->user= $this->userRepository->findByEmailAndPassword($email,$password);

    //    var_dump($this->user);
    //    die();
       $this->user->setRole($this->roleService->getRoleById($this->user->getRoleId()));
    // var_dump($this->user);
    // die();
       return $this->user;
   }
}

?>