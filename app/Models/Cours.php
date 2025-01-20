<?php
include('categories.php');

class Cour {

    private int $id;
    private string $name;
    private string $Description;
    private string $contenu;
    private string $DateAndTime;
    private string $image;
    private array $tagsIds;
    private Categorie $categorie;
    private int $enseigneurId;
    private array $etudiantsIds;
    private int $categorieId;
    
    

    

    public function __construct(){
     $this -> categorie = new Categorie();
     
    }

   public function setTagIds($id){
          $this->tagsIds=$id;
    }
    public function setCategorie(Categorie $categorie){
         $this-> categorie= $categorie;
    }
    
    public function setEtudiantsIds($etudiantsId){
    $this -> etudiantsIds=$etudiantsId;
    }


    public function getID(){
        return $this -> id;
    }

   public function getTitre(){
        return $this -> name;
    }
   public function getDescription(){
        return $this ->Description;
        }
    public function getContenu(){
        return $this -> contenu;
    }
public function getDate(){
    return $this -> DateAndTime;
}
public function getImage(){
    return $this -> image;
}
public function getTags(){
return $this -> tagsIds;
}
public function getCategorie(){
    return $this -> categorie;
}
public function getEtudiantsIds(){
return $this -> etudiantsIds;
}
public function getcategorieId(){
    return $this->categorieId;
}



public function __toString()
{
    return "(cours) => id : " . $this->id . " , titre : "
. $this->name . " , description:  , enseignant: " . $this->enseigneurId ."
       " . $this->Description . " , contenu: " . $this->contenu . " 
        , categorie: " . $this->categorie . " , tags: " . implode(" , ", $this->tagsIds) 
        . " , students: " . implode(" , ", $this->etudiantsIds). ".";
}



}
?>