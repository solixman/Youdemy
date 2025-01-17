<?php


class Role{

    private int $id=1;
    private string $name;
    private string $Description;
    private string $Logo ;

    public function __construct(){}
        

    public function setId(int $id): void {
        $this->id = $id;
    }

    public function setRoleName(string $roleName) : void {
        $this->name = $roleName;
    }

    public function setDescription(string $description) : void {
        $this->Description = $description;
    }

    public function setLogo(string $logo): void {
        $this->Logo = $logo;
    }

    public function getId(): int {
        return $this->id;
    }

    public function getRoleName() : string {
        return $this->name;
    }

    public function getDescription(): string {
        return $this->Description;
    }

    public function getLogo(): string {
        return $this->Logo;
    }

    // public function __call($name,$arguments){
        
    //     if($name='instanceWithoutId'){
    //         $this -> roleName=$arguments[0];
    //         $this -> roleDescription=$arguments[1];
    //         $this -> logo = $arguments[2];
    //     }
    // }


    public function __toString()
    {
        return "(Role) => id : " . $this->id . " , name : " . $this->name . " , description : " . $this ->Description . " , logo : " . $this ->Logo ."";
    }

    }
