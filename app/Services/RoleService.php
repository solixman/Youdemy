<?php
// include("./../app/Repositories/Respositorie.php");

class RoleService
{
  public roleRepository $roleRespository;
  public GRepository $GRepository;
  private Role $role;

  public function __construct()
  {
    $this->role = new Role();
    $this->roleRespository = new RoleRepository();
    $this ->GRepository = new GRepository();
  }


  //    public function getRoleByName(string $name){

  //         if (empty($name)) {
  //             return false;
  //         }
  //         $role = $this->roleRespository->findByName($name);
  //     }

  public function createRole(Role $role)
  {
    $tablename = 'Roles';
    $params = [
      'name' => $role->getRoleName(),
      'Description' => $role->getDescription(),
      'Logo' => $role->getLogo()
    ];
    $this->GRepository->create($tablename, $params);
  }


  public function deleteRole(Role $role){
    $tablename = 'Roles';
    $id = $role->getId();
    $this->GRepository->delete($tablename, $id);
  }


public function updateRole(Role $role){
  $tablename ='Roles';
  $params = [
    'name' => $role->getRoleName(),
    'Description' => $role->getDescription(),
    'Logo' => $role->getLogo()
  ];
  $id = $role->getId();
  $this->GRepository->update($tablename, $id, $params);

}

public function getAllRoles(){
$tablename ='Roles';
$Result = $this->GRepository->getAll($tablename);
// var_dump($Result);
return $Result;
}

public function getRoleById($id){
  $tablename ='Roles';
$Result = $this->GRepository->getById($tablename,$id);

//  var_dump($Result);
return $Result;
}

public function getRoleByName($roleName){
  $result = $this->roleRespository->findByName($roleName);
  return $result;
}

}



