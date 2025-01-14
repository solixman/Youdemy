<?php


class Role{

    private int $id;
    private string $roleName;
    private string $roleDescription;
    private string $logo;

    public function __construct(){}
        

    public function setId(int $id): void {
        $this->id = $id;
    }

    public function setRoleName(string $roleName) : void {
        $this->roleName = $roleName;
    }

    public function setDescription(string $description) : void {
        $this->roleDescription = $description;
    }

    public function setLogo(string $logo): void {
        $this->logo = $logo;
    }

    public function getId(): int {
        return $this->id;
    }

    public function getRoleName() : string {
        return $this->roleName;
    }

    public function getDescription(): string {
        return $this->roleDescription;
    }

    public function getLogo(): string {
        return $this->logo;
    }

    public function __call($name,$arguments){
        
        if($name='instanceWithoutId'){
            $this -> roleName=$arguments[0];
            $this -> roleDescription=$arguments[1];
            $this -> logo = $arguments[2];
        }
    }


    }
