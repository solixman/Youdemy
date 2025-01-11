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
    private  $role;
    private $reservations = [];
    private int $role_id = 0 ;

    // public function __construct () {
    //     $this->role = new Role();
    // }

    public static function instanceWithFirstnameAndLastname(string $firstName, string $lastName){
        $instance = new self();
        $instance -> firstname = $firstName ;
        $instance -> lastname = $lastName;

        return $instance ;
    }
    public static function instaceWithEmailAndPassword(string $email , string $password): self
    {
        $instance = new self();
        $instance->email = $email;
        $instance->password = $password;

        return $instance;
    }

    public static function instanceWithFirstnameAndLastnameAndEmail(string $firstname, string $lastname, string $email) {
        $instance = self::instanceWithFirstnameAndLastname($firstname, $lastname);

        $instance->email = $email;

        return $instance;
    }

    public static function instanceWithoutId(string $firstname, string $lastname, string $email, string $password, string $phone, string $photo,  $role, array $reservations) {
        $instance = self::instanceWithFirstnameAndLastnameAndEmail($firstname, $lastname, $email);

        $instance->password = $password;
        $instance->phone = $phone;
        $instance->photo = $photo;
        $instance->role = $role;
        $instance->reservations = $reservations;

        return $instance;
    }

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

    public function setRole( $role):void {  //type role
        $this->role = $role;
    }

    public function setReservations(array $reservations):void {
        $this->reservations = $reservations;
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

    public function getRole()  {  //returns role 
        return $this->role;
    }

    public function getReservations(): array {
        return $this->reservations;
    }

    public function getPhoto(): string {
        return $this->photo;
    }

    // public function setRoleId($id)

    public function toStringWithFirstnameAndLastname() {    
        return "(Utilisateur) => id : " . $this->id . " , firstname : " . $this->firstname . " , lastname : " . $this->lastname ;
    }


    public function __toString() {
        return $this->toStringWithFirstnameAndLastname() . 
        " , phone : " .$this->phone . " , email : " . $this->email  . " , password : " . $this->password . " photo : " . $this->photo . " , Role : " . $this->role . " , reservation : [" . implode(",", $this->reservations)."] , Role_ID : " . $this->role_id . "" ;
    }


    public function getRole_ID(){
        return $this -> role_id;
    }

    

    
}