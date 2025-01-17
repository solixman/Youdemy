<?php
class UserRepository{

    private GDAO $GDAO;
    // private UserDao $userDao;
    public function findByEmailAndPassword($email,$password) {
         try{
        $query = "SELECT id, name, lName, email, phone, photo, roleId, password FROM utilisateurs WHERE email = '" . $email . "' AND password = '". $password ."';";
        $stmt = Database::getInstance()->getConnection()->prepare($query);
        $stmt->execute();
         }catch(PDOException $e){
            echo'Error:'.$e;
         }
         $result= $stmt->fetchObject(Utilisateur::class); 

        //  var_dump($result);
        //  die();
        return $result;
    }

}
?>