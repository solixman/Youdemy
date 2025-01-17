<?php
class LoginForm{
    public string $Email;
    public string $password;

    public function __construct()
    { 
    }
    
    public function __call($name, $arguments)
    {
        if ($name="instance" ){
            if(count($arguments)==7){
            $this -> Email =$arguments[0];
            $this -> password = $arguments[1];
            } 
        }
    }
    

}
?>