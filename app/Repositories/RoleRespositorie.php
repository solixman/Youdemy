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
        var_dump($query);
        $stmt = Database::getInstance()->getConnection()->prepare($query);
        $stmt ->execute();
          
         $result = $stmt ->fetchall(pdo::FETCH_CLASS,'Role'); 
          var_dump($result);
          die;    
return $result;
    }

 }
?>