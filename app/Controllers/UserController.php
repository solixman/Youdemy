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

    // $role = Role::__call(instanceWithoutId,$rolename);

    
    $user = new Utilisateur('instanceWithoutId',$arguments);


    try {
        $user = $this->userService->create($user);
        return $user;
    }catch (Exception $e) {
        die("Erreur de base de données : " . $e->getMessage());
    }

    
}

}

?>