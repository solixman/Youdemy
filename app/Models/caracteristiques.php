<?php

class Infos
{
    protected int $id;
    protected string $name;
    protected string $description;

    public function __construct($description, $name)
    {
        $this->name = $name;
        $this->description = $description;
    }

    public function getName(): string
    {
        return $this->name;
    }
    public function getDescription(): string
    {
        return $this->description;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }
    public function setDescription($desc):void
    {
        $this -> description =$desc;
    }

    public function __toString(): string
    {
        return "id: " .$this->id. " , name: " .$this->name. " , description: " .$this->description. " .";
    }

}
