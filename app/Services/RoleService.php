<?php

class RoleService{
    public roleRepository $roleRespository;
    private Role $role;
   
    public function __construct() {
      $this -> role = new Role();
      $this -> roleRespository = new RoleRepository();
    }


   public function getRoleByName(string $name){
        
        if (empty($name)) {
            return false;
        }
        $role = $this->roleRespository->findByName($name);
    }
}


?>