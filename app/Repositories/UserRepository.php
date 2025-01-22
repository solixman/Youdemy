 <?php
include_once dirname(__DIR__). '/core/Database.php';
class UserRepository{

    private GDAO $GDAO;
    // private UserDao $userDao;

    public function  __construct()
    {
    $this -> GDAO = new GDAO();
    }

    public function findByEmailAndPassword($email,$password) {
         try{
        $query = "SELECT id, name, lastName, email, phone, photo, roleId, password FROM utilisateurs WHERE email = '" . $email . "' AND password = '". $password ."';";
        $stmt = Database::getInstance()->getConnection()->prepare($query);
        $stmt->execute();
        $result= $stmt->fetchObject(Utilisateur::class); 

         }catch(PDOException $e){
            echo'Error:'.$e;
         }

        if(!$result){
        return new Utilisateur();
        }else{
        return $result;
        }
        //  var_dump($result);
        //  die();
    }
    public function update($user){
    var_dump($user);
    die;
    $params=[
       'name'=>$user-> getname(),
       'lastName'=>$user->getLastName(),
       'email'=>$user->getEmail(),
       'password'=>$user->getPassword(),
       'photo'=>$user->getPhoto(),
       'phone'=>$user->getPhone()
    ];

    $this -> GDAO->update('Utilisateurs', $user->getId, $params);
    }

}
 ?>

