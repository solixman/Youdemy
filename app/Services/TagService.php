<?php
require_once('./../app/Repositories/Respositorie.php');
class TagService{
    
    private GRepository $Grepository;

    public function __construct()
    {
        $this -> Grepository = new GRepository;
    }

    public function getTagById($id){
        $tablename='Tags';
        $result =$this ->Grepository->getById($tablename,$id);
       return $result;
       }
       
   

}

?>