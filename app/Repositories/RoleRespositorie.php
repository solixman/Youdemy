<?php


class RoleRepository{

    // private RoleDao $RoleDao;

    public function __construct()
    {
        // $this -> RoleDao = new RoleDao()
    }
    public function createRole($role){
     
    }

    public function findByName($roleName){
        $query='SELECT id,roleName,roleDescription, roleLogo FROM Roles WHERE roleName = ' . $roleName . ';';
        $stmt = Database::getInstance()->getConnection()->prepare($query);
        $stmt ->execute();
        return $stmt ->fetchObject(Role::class);        
    }

 }
?>