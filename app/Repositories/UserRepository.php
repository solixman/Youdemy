 <?php
include_once dirname(__DIR__). '/core/Database.php';
class UserRepository{

    private GDAO $GDAO;
    // private UserDao $userDao;
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

}
 ?>

