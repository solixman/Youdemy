<?php


class UserService{
    private Utilisateur $user;
    private GRepository $GRepository;
    private RoleService $roleService;
    private userRepository $userRepository;

    public function __construct() {
        $this->GRepository = new GRepository();
        $this->roleService = new RoleService();
        $this-> userRepository = new userRepository();
        $this-> user = new Utilisateur();
    }

public function create(Utilisateur $utilisateur){  
     $tablename='Utilisateurs';
     $params=[
        'name'=>$utilisateur->getname(),
        'lastName'=>$utilisateur->getLastname(),
        'email'=>$utilisateur->getEmail(),
        'password'=>$utilisateur->getPassword(),
        'phone'=>$utilisateur->getPhone(),
        'roleId'=>$utilisateur->getRoleId(),
        'photo'=>$utilisateur->getPhoto()
     ];
    $this->GRepository->create($tablename, $params);  
    $utilisateur->setRole($this->roleService->getRoleByName($utilisateur->getRole()->getRoleName()));
    return $utilisateur;
}


public function getAll(){
    $tablename='Utilisateurs';
    $users= $this->GRepository->getAll($tablename);
    foreach($users as $user){
    $user->setRole($this->roleService->getRoleById($user->getRoleId()));
    }
    // var_dump($user);
    // die;
    return $users;

}

    public function findByEmailAndPassword(Utilisateur $user)   
    {
    //     var_dump($user);
    //    die();
       $email = $user->getEmail();
       $password=$user->getPassword();
      
      $this->userRepository->findByEmailAndPassword($email,$password);
       $this->user->setRole($this->roleService->getRoleById($this->user->getRoleId()));
    // var_dump($this->user);
    // die();
       return $user;
   }
}

?>