<?php

class CourRepository{

    private GDAO $GDAO;
    private $CoursDao ;
    public function __function(){
        $this-> GDAO = new GDAO();
    }

    public function findTagsforCours($id){

    try{
        $query='SELECT TagId FROM cours_Tag WHERE coursId='. $id .'' ;
        $stmt = Database::getInstance()->getConnection()->prepare($query);
        $stmt ->execute();
        return $stmt ->fetchall(PDO::FETCH_ASSOC);   
    }catch(PDOException $e){
     echo'error: '.$e;
    }
    }

    
    public function findstudentsforCours($id){

        try{
            $query='SELECT studentId FROM registeration WHERE coursId='. $id .'' ;
            $stmt = Database::getInstance()->getConnection()->prepare($query);
            $stmt ->execute();
            return $stmt ->fetchall(PDO::FETCH_ASSOC);   
        }catch(PDOException $e){
         echo'error: '.$e;
        }
        }


}

?>