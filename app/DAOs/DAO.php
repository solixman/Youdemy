<?php
include './../app/Core/Database.php';
require_once './../app/Models/roles.php';
class DAO
{

    public function create(string $tablename, $params)
    {
        $columns = [];
        $values = [];

        foreach ($params as $key => $value) {
            if (gettype($value) == "integer" || gettype($value) == "double") {
                array_push($columns, $key);
                array_push($values, $value);
            } else {
                array_push($columns, $key);
                array_push($values, "'" . $value . "'");
            }
        }

        var_dump($columns);
        var_dump($values);

        try {

            $query = " INSERT INTO " . $tablename . "(" . implode(" , ", $columns) . ") VALUES  (" . implode(" , ", $values) . ")";

            $stmt = Database::getInstance()->getConnection()->prepare($query);
            $stmt->execute();
            echo "Data created successfully!";
        } catch (PDOException $e) {  
            echo "Error: " . $e->getMessage();
        }
    }

    public function delete($tablename, $id)
    {

        try {

            $query = " DELETE FROM  " . $tablename . " WHERE id = " . $id . "";

            $stmt = Database::getInstance()->getConnection()->prepare($query);
            $stmt->execute();
            // echo "Data deleted successfully!";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }



    public function update($tablename, $id, $params)
    {
        $columns = [];
        $values = [];
        $SET = [];
        $combined = [];

        foreach ($params as $key => $value) {
            if (gettype($value) == "integer" || gettype($value) == "double") {
                array_push($columns, $key);
                array_push($values, $value);
            } else {
                array_push($columns, $key);
                array_push($values, "'" . $value . "'");
            }
        }

        $combined = array_combine($columns, $values);
        foreach ($combined as $key => $value) {
            array_push($SET, "" . $key . "=" . $value . "");
        }


        // var_dump($combined);
        // var_dump($SET);
        try {
            $query = "UPDATE " . $tablename . " SET  " . implode(",", $SET) . " WHERE id = " . $id . ";";
            // var_dump($query);
            $stmt = Database::getInstance()->getConnection()->prepare($query);
            $stmt->execute();
            // echo ("data updated succefully");
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }



     public function getAll($tablename){
      
        try{
            $query="SELECT id, roleName , roleDescription, roleLogo FROM " . $tablename . ";";
            $stmt = Database::getInstance()->getConnection()->prepare($query);
            $stmt -> execute();
            // var_dump($query); 
            $result = $stmt->fetchall();
            return $result ;
        }catch(PDOException $e){
            echo("Error:" . $e);
        }
     } 

     public function getOneById($tablename,$id){
      
        try{
            $query="SELECT id, roleName , roleDescription, roleLogo FROM " . $tablename . " WHERE id = " . $id . " ;";
            $stmt = Database::getInstance()->getConnection()->prepare($query);
            $stmt -> execute();
            //  var_dump($query); 
            $result = $stmt->fetchObject();
            return $result ;
        }catch(PDOException $e){
            echo("Error:" . $e);
        }
     } 
}
