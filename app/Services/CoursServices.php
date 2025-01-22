<?php
require_once('./../app/Repositories/Respositorie.php');
require_once('./../app/Models/Cours.php');
require_once('./../app/Repositories/CourRepository.php');
require_once('./../app/Services/CategorieService.php');
require_once('./../app/Services/TagService.php');
require_once('./../app/Services/userService.php');



class courService{
  private UserService $userService;
  private GRepository $GRepository;
  private Cour $cour;
  private CourRepository $CourRepository;
  private CategorieService $CategorieService;
  private tagService $tagService;

  public function __construct()
  {
    $this ->GRepository = new GRepository();
    $this ->cour = new Cour();
    $this ->CourRepository = new CourRepository();
    $this ->CategorieService = new CategorieService();
    $this ->userService = new UserService();
  }

  public function getCoursById($id){
    $tablename='cours';
    $this-> cour = $this-> GRepository->getById($tablename,$id);
    $this-> cour->setTagIds(self::getTagsidsforCours($this->cour->getID()));
    $this-> cour->setCategorie($this->CategorieService->getcategorieById($this->cour->getcategorieId()));
    $this-> cour->setEtudiantsIds(self::getstudentsforCours($this->cour->getID()));
    return $this-> cour;
  }

  public function getAllCourses(){
    $tablename='cours';
    $result = $this-> GRepository->getAll($tablename);
    foreach($result as $cour){
    $cour = $this-> GRepository->getById($tablename,$cour->getID());
    $cour->setTagIds(self::getTagsidsforCours($cour->getID()));
    $cour->setCategorie($this->CategorieService->getcategorieById($cour->getcategorieId()));
    $cour->setEtudiantsIds(self::getstudentsforCours($cour->getID()));
    }
    return $result;
  }
  
  public function getstudentsforCours($id){
   return $this->CourRepository->findstudentsforCours($id);
  }
    
  public function getTagsidsforCours($id){
    // $tablename='cours_Tag';
    return $this->CourRepository->findTagsforCours($id);
  }

}

?>