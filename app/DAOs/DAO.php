<?php

class GDAO
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
            echo "Data deleted successfully!";
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
        //
        foreach ($combined as $key => $value) {
            array_push($SET, $key . "=" . $value); 
        }
        // var_dump($combined);
        // var_dump($SET);
        try {
            $query = "UPDATE " . $tablename . " SET  " . implode(",", $SET) . " WHERE id = " . $id . ";";
            // var_dump($query);
            $stmt = Database::getInstance()->getConnection()->prepare($query);
            $stmt->execute();
             echo ("data updated succefully");
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }



     public function getAll($tablename){
      
        try{
            $query="SELECT * FROM " . $tablename . ";";
            $stmt = Database::getInstance()->getConnection()->prepare($query);
            $stmt -> execute();
            // var_dump($query); 
            $result = $stmt->fetchall(PDO::FETCH_CLASS,substr($tablename,0,-1));
            // var_dump($result);
            // die();
            
            return $result ;
        }catch(PDOException $e){
            echo("Error:" . $e);
        }
     } 

     public function getById($tablename,$id){
      
        try{
            $query="SELECT * FROM " . $tablename . " WHERE id = " . $id . " ;";
            $stmt = Database::getInstance()->getConnection()->prepare($query);
            $stmt -> execute();
            //  var_dump($query); 
            $result = $stmt->fetchObject(substr($tablename,0,-1));
            // var_dump($result);
            // die();
            return $result ;
        }catch(PDOException $e){
            echo("Error:" . $e);
        }
        


     } 
}


?>