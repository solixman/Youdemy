<?php
// require_once("../app/core/Database.php");
// require_once("../app/Models/Role.php");
// require_once("../app/Services/RoleService.php");
// require_once("../app/Repositories/RoleRespositorie.php");



include('../app/DAOs/DAO.php');

class test {
    public function __construct()
    {}



    public function TestDAOcreate(){
      $tablename='Roles';
      $params=[
        'roleName'=>'administrateur',
        'roleDescription'=>'a description dont worry about it malak dakhl',
        'roleLogo'=>'logo.com'];
        $DAO = new DAO();
        $DAO -> create($tablename,$params);
    }



    public function TestDAODelete(){
     $tablename= 'Roles';
     $id=5;
     $DAO = new DAO() ;
     $DAO -> delete($tablename,$id);
    }


    public function testDAOUpdate(){

     $tablename='Roles';
     $id=6;
     $params=[
        'roleName'=>'visiteur',
        'roleDescription'=>'another none similar description',
        'roleLogo'=>'logo.com'];
        $DAO = new DAO();
        $DAO -> update($tablename,$id,$params);
    }
    
    
    public function TestDAOGetALL(){
        $tablename= 'Roles';
        $DAO = new DAO() ;
     $DAO -> getAll($tablename);
    }

    public function TestDAOGetOneById(){
        $id=6;
        $tablename= 'Roles';
        $DAO = new DAO() ;
     $DAO -> getOneById($tablename,$id);

    }
}



$test = new Test();
// $test -> TestDAOcreate();
// $test -> TestDAODelete();
// $test-> testDAOUpdate()
// $result = $test -> TestDAOGetALL();
// var_dump("$result");
$result = $test-> TestDAOGetOneById();
var_dump($result);



?>