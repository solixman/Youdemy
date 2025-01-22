<?php
include('infos.php');

class Categorie extends Info{

    public function __construct()
    {
        
    }

    
    
    public static function instanceNameDescription(string $name,string $description){
        $instance = new self();
        $instance->name = $name;
        $instance->Description = $description;

        return $instance;
    }

public function __toString() {
        return "(Categorie)=> ".parent::__toString();
    }

}



?>