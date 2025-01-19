<?php
require_once('./../app/Repositories/Respositorie.php');
require_once('./../app/Models/Cours.php');
require_once('./../app/Repositories/CourRepository.php');
require_once('./../app/Services/CategorieService.php');
require_once('./../app/Services/TagService.php');



class courService{

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
  }

  public function getAllCourses(){
    $tablename='cours';
    $Result = $this->GRepository->getAll($tablename);
    return $Result;
}
    
  

}

?>