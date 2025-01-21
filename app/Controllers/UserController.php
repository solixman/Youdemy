<?php

class UserController{

private Utilisateur $user;
private UserService $userService;


public function __construct() {
    $this->userService = new UserService();
}

public function createUtilisateur() {

    $arguments=[];
    $arguments[0]= "first";
   $arguments[1]="last";
   $arguments[2]= "0607189671";
   $arguments[3]= "Logo.png";
   $arguments[4]="adminsssdsd@example.com";
   $arguments[5]= "998877";
   $arguments[6]= "visiteur";

    $user = new Utilisateur('instanceWithoutId',$arguments);
        $user = $this->userService->create($user);
        return $user;
}


public function getAll(){
    // var_dump($this->userService->getAll());
    // 
    $users=$this->userService->getAll();
    // var_dump($users);
    // die;
    return $users ;
}


}


?>