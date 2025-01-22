<?php
require_once('./../app/Repositories/Respositorie.php');


class CategorieService{
    private GRepository $Grepository;


    public function __construct()
    {
    $this-> Grepository = new GRepository();
    }
    
    public function getcategorieById($id): Categorie{
     $tablename='Categories';
     $result =$this ->Grepository->getById($tablename,$id);
    if ($result) {
        return $result;
    }

    return new Categorie();
    }

}


?>