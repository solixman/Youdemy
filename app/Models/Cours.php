<?php

class Cours {
    private int $id;
    private string $titre;
    private string $description;
    private string $contenu;
    private string $dateUploading;
    private string $image;
    private array $tagsIds;
    private Categorie $categorie;
    private array $etudiantsIds;
    
     

    public function __construct(){
     $this -> categorie = new Categorie();
     
    }

   public function getTitre(){
        return $this -> titre;
    }
   public function getDescription(){
        return $this -> description;
    }
    public function getContenu(){
        return $this -> contenu;
    }
public function getDate(){
    return $this -> dateUploading;
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
}


?>