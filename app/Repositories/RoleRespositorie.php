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
        // var_dump($query);
        // die;
        try{
        $stmt = Database::getInstance()->getConnection()->prepare($query);
        $stmt ->execute();
        $result = $stmt ->fetchObject('Role'); 
        }catch(PDOException $e){
            echo'error:'.$e;
        }
        //   var_dump($result);
        //   die;    
          return $result;
    }

 }
?>