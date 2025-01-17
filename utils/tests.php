<?php
// require_once("../app/core/Database.php");
//  require_once("../app/Models/Role.php");
 include("../app/Services/RoleService.php");
 include("../app/Repositories/RoleRespositorie.php");
 include("../app/Models/Utilisateurs.php");
 include('../app/Repositories/UserRepository.php');
 include('../app/Services/Userservice.php');
include('../app/Services/authService.php');
include('../app/http/registerform.php');
include('../app/http/LogInForm.php');
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
     $id=2;
     $params=[
        'name'=>'visiteur',
        'Description'=>'another none similar description',
        'Logo'=>'logo.com'];
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
       $result= $roleServise -> getRoleById(2);
        return $result;
       //    $role = $DAO ->getById($tablename,$role->getId());  just a test 
       // return $role;
       
    }

    public function testUserRepo(){
        $user = new Utilisateur();
        $user ->setEmail('email.com');
        $user ->setPassword('a password');
        $userRepo= new UserRepository();
        // $userRepo ->findByEmailAndPassword($user);
        return $user;
    }
    public function testUserService(){
        $user = new Utilisateur();
        $user ->setEmail('tayebss@jaa.com');
        $user ->setPassword('tayebSS231');
        $userRepo= new UserService();
        $userRepo ->findByEmailAndPassword($user);
        return $user;
    }

    public function testAuthService(){
        //   $registerFrom   = new RegisterForm();
          $authsrvs = new authService();
          $loginForm = new LoginForm();
        //   $registerFrom->instance('abir','meskini','abir.meskini@gmail.com','abir02','abir02','069090808','photo.abir');
        //  $authsrvs->register($registerFrom);
        // $loginForm ->instance('tayebss@jaa.com','tayebSS231');
        
        $loginForm->setEmail('soulaymanjaafar@jaa.com');
        $loginForm->setPassword('jaafarYodode9');
        $user =  $authsrvs -> login($loginForm);
         return $user ;
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


// $result =$test->TestRoleService();
// var_dump($result);
// foreach($result as $result){
//     print ($result);
// }


// $utiilss = new Utilisateur();
//  $utiilss->instance('soulayman','jaafar');

//  $test = $utiilss->toStringWithFirstnameAndLastname();
// print($test);

// $result = $test->testAuthService();
// var_dump($result);


?>