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

public function create(Utilisateur $utilisateur){
  
     $tablename='Utilisateurs';
     $params=[
        'name'=>$utilisateur->getFirstname(),
        'lastName'=>$utilisateur->getLastname(),
        'email'=>$utilisateur->getEmail(),
        'password'=>$utilisateur->getPassword(),
        'phone'=>$utilisateur->getPhone(),
        'roleId'=>$utilisateur->getRoleId(),
        'photo'=>$utilisateur->getPhoto(),
     ];
       
// $this -> user= new Utilisateur();
    $this->GRepository->create($tablename, $params);  
    $utilisateur->setRole($this->roleService->getRoleByName($utilisateur->getRole()->getRoleName()));
    return $utilisateur;
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