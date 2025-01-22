<?php


class Info{

    protected int $id = 0;
    protected string $name;
    protected string $Description;

    public function __construct(){}



    public function setID(int $id): void 
    {
        $this->id = $id;
    }

    public function setName(string $name): void 
    {
        $this->name = $name;
    }
    public function setDescription(string $description): void 
    {
        $this->Description = $description;
    }


    public function getId(): int
    {
        return $this->id;
    }
    public function getName(): string 
    {
        return $this->name;
    }
    public function getDescription(): string 
    {
        return $this->Description;
    }


    public function __toString(): string
    {
        return "id: " .$this->id. " , name: " .$this->name. " , description: " .$this->Description. " .";
    }


}


?>