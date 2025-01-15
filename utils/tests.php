<?php
// require_once("../app/core/Database.php");
//  require_once("../app/Models/Role.php");
 require_once("../app/Services/RoleService.php");
 require_once("../app/Repositories/RoleRespositorie.php");



include('../app/DAOs/DAO.php');

class test {

    public function __construct()
    {}



    public function TestDAOcreate(){
      $tablename='Utilisateurs';
      $params=[
        'name'=>'administrateur',
        'lName'=>'a description dont worry about it malak dakhl',
        'email'=>'logo.com',
        'password'=>'a password',
        'phone' => '069558746',
        'roleId'=>'2',
    
    ];
        $DAO = new GDAO();
        $DAO -> create($tablename,$params);
    }



    public function TestDAODelete(){
     $tablename= 'Roles';
     $id=5;
     $DAO = new GDAO() ;
     $DAO -> delete($tablename,$id);
    }


    public function testDAOUpdate(){

     $tablename='Utilisateurs';
     $id=6;
     $params=[
        'roleName'=>'visiteur',
        'roleDescription'=>'another none similar description',
        'roleLogo'=>'logo.com'];
        $DAO = new GDAO();
        $DAO -> update($tablename,$id,$params);
    }
    
    
    public function TestDAOGetALL(){
        $tablename= 'Roles';
        $DAO = new GDAO() ;
       return $DAO -> getAll($tablename);
    }

    public function TestDAOGetOneById(){
        $id=6;
        $tablename= 'Roles';
        $DAO = new GDAO() ;
        $result = $DAO -> getById($tablename,$id);
        if($result == null){
            echo("error");
        }
    }

    public function TestRoleService(){
       $role = new Role();
       $role->setId(2);
       $role->setRoleName('administratuer');
       $role -> setDescription("another description");
       $role -> setLogo('logohhh.com');
       $roleServise= new RoleService();
       $result= $roleServise -> getAllRoles();
        return $result;
       //    $role = $DAO ->getById($tablename,$role->getId());  just a test 
       // return $role;
       
    }

}



$test = new Test();

// $test -> TestDAOcreate();
// $test -> TestDAODelete();
// $test-> testDAOUpdate()
// $result = $test -> TestDAOGetALL();
// var_dump("$result");
// $result =$test-> TestDAOGetAll();
// // var_dump($result);
// foreach($result as $result){
//     print ($result);
// }

$result =$test->TestRoleService();
// var_dump($result);




?>