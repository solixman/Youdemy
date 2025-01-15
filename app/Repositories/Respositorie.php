<?php
// include_once '../DAOs/DAO.php';
class GRepository{

  private $instance;
  private $DAO ;

  public function __construct(){
    $this -> DAO = new GDAO();
  }

  public function create($tablename,$params){
    $this -> DAO->create($tablename,$params);
  }

  public function delete($tablename,$id){
    $this -> DAO->delete($tablename,$id);
  }

  public function update($tablename, $id, $params){
    $this -> DAO->update($tablename, $id, $params);
  }

  public function getAll($tablename){
    return $this -> DAO->getALL($tablename);

  }

  public function getById($tablename,$id){
    return $this -> DAO->getById($tablename,$id);
  }


  public function getbyname($tablename,$id){
    try{
        $query="SELECT * FROM " . $tablename . " WHERE name = " . $id . " ;";
        $stmt = Database::getInstance()->getConnection()->prepare($query);
        $stmt -> execute();
        //  var_dump($query); 
        $result = $stmt->fetchall(PDO::FETCH_CLASS,substr($tablename,0,-1));
        return $result ;
    }catch(PDOException $e){
        echo("Error:" . $e);
    }
  }

}

?>