<?php


class RoleRepository{

    // private RoleDao $RoleDao;

    public function __construct()
    {
        // $this -> RoleDao = new RoleDao()
    }
    public function createRole($role){
     
    }

    public function findByName($name){
        $query='SELECT * FROM Roles WHERE name ="' . $name . '";';
        $stmt = Database::getInstance()->getConnection()->prepare($query);
        $stmt ->execute();
        return $stmt ->fetchObject(Role::class);        
    }

 }
?>