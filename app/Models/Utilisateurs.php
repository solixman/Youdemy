<?php 

// include './../app/Models/Role.php';
// include './Reservation.php';

class Utilisateur {
    private int $id = 0;
    private string $firstname = "";
    private string $lastname = "";
    private string $email = "";
    private string $password = "";
    private string $phone = "";
    private string $photo = "";
    private  Role $role;
    private $cours = [];
    private int $role_id = 0 ;

    public function __construct () {
        $this->role = new Role();
    }

    public  function __call($name, $arguments)
    {
        if ($name="instanceWithoutId" ){
            $this -> firstname = $arguments[0];
            $this -> lastname = $arguments[1];
            $this -> email =$arguments[2];
            $this -> password = $arguments[3];
            $this -> phone =$arguments[4];
            $this -> photo = $arguments[5];
            $this -> cours = $arguments[6];
        }}

    public function setId(int $id): void {
        $this->id = $id;
    }

    public function setFirstname(string $firstname): void {
        $this->firstname = $firstname;
    }

    public function setLastname(string $lastname): void {
        $this->lastname = $lastname;
    }

    public function setEmail(string $email) :void {
        $this->email = $email;
    }

    public function setPassword(string $password): void {
        $this->password = $password;
    }
    public function setPhone(string $phone):void {
        $this->phone = $phone;
    }

    public function setPhoto(string $photo):void {
        $this->photo = $photo;
    }



    public function setcours(array $cours):void {
        $this->cours = $cours;
    }

    public function getId(): int{
        return $this->id;
    }

    public function getFirstname(): string {
        return $this->firstname;
    }

    public function getLastname(): string {
        return $this->lastname;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function getPhone(): string {
        return $this->phone;
    }

    public function getPassword(): string {
        return $this->password;
    }

    public function getRole():Role  {  
        return $this->role;
    }

    public function getCours(): array {
        return $this->cours;
    }

    public function getPhoto(): string {
        return $this->photo;
    }



  
    public function toStringWithFirstnameAndLastname() {    
        return "(Utilisateur) => id : " . $this->id . " , firstname : " . $this->firstname . " , lastname : " . $this->lastname ;
    }


    public function __toString() {
        return $this->toStringWithFirstnameAndLastname() . 
        " , phone : " .$this->phone . " , email : " . $this->email  . " , password : " . $this->password . " photo : " . $this->photo . " , Role : " . $this->role . " , cours : [" . implode(",", $this->cours)."] , Role_ID : " . $this->role_id . "" ;
    }


    public function getRole_ID(){
        return $this -> role_id;
    }

    

    
}