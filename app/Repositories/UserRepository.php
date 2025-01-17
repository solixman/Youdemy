<?php
class UserRepository{

    private GDAO $GDAO;
    // private UserDao $userDao;
    public function findByEmailAndPassword(Utilisateur $user) {
         try{
        $query = "SELECT id, name, lName, email, phone, photo, roleId, password FROM utilisateurs WHERE email = '" . $user->getEmail() . "' AND password = '". $user->getPassword() ."';";
        $stmt = Database::getInstance()->getConnection()->prepare($query);
        $stmt->execute();
         }catch(PDOException $e){
            echo'Error:'.$e;
         }
        return $stmt->fetchObject(Utilisateur::class);
    }

}
?>