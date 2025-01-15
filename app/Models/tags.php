<?php
include('./infos.php');


class Tags extends Info{

    private string $logo;

    public function __construct($logo){
        parent::__construct();
        $this-> logo= $logo;
    }

    public function setLogo(string $logo): void 
    {
        $this->logo = $logo;
    }
    public function getLogo(): string 
    {
        return $this->logo;
    }

    public function __toString()
    {
        return "(tags)=>". parent::__toString() . " , logo: " .$this->logo;
    }
    
}
?>
