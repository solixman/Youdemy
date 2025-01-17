<?php 

// include './../app/Models/Role.php';
// include './Reservation.php';

class Utilisateur {
    private int $id = 1;
    private string $name ;
    private string $lName;
    private string $email;
    private string $password ;
    private string $phone ;
    private string $photo ;
    private  Role $role;
    private $cours = [];
    private int $roleId=1;

    public function __construct () {
        $this->role = new Role();
    }

    public  function __call($name, $arguments)
    {
        if ($name="instance" ){
            if(count($arguments)==8){
            $this -> name = $arguments[0];
            $this -> lName = $arguments[1];
            $this -> email =$arguments[2];
            $this -> password = $arguments[3];
            $this -> phone =$arguments[4];
            $this -> photo = $arguments[5];
            $this -> role = $arguments[6];
            $this -> cours = $arguments[7];
            }
            if(count($arguments)==2){
                $this -> name = $arguments[0];
                $this -> lName = $arguments[1];
                
                }

        }}
   public function setRole(Role $role){
    $this -> role = $role;
   }
    public function setId(int $id): void {
        $this->id = $id;
    }

    public function setFirstname(string $firstname): void {
        $this->name = $firstname;
    }

    public function setLastname(string $lastname): void {
        $this->lName = $lastname;
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
 
    public function setRoleId(string $id){
        $this ->roleId=$id;
    }

    public function setcours(array $cours):void {
        $this->cours = $cours;
    }

    public function getId(): int{
        return $this->id;
    }

    public function getFirstname(): string {
        return $this->name;
    }

    public function getLastname(): string {
        return $this->lName;
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

    public function getRole():Role {  
        return $this->role;
    }

    public function getCours(): array {
        return $this->cours;
    }

    public function getPhoto(): string {
        return $this->photo;
    }

    public function getRoleId(){
        return $this -> roleId;
    }


  
    public function toStringWithFirstnameAndLastname() {    
        return "(Utilisateur) => id : " . $this->id . " , firstname : " . $this->name . " , lastname : " . $this->lName ;
    }


    public function __toString() {
        return $this->toStringWithFirstnameAndLastname() . 
        " , phone : " .$this->phone . " , email : " . $this->email  . " , password : " . $this->password . " photo : " . $this->photo . " , Role : " . $this->role . " , cours : [" . implode(",", $this->cours)."] , Role_ID : " . $this->roleId . "" ;
    }



    

    
}