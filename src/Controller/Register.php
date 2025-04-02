<?php 

namespace Os\Test\Controller;
use Os\Test\View;
use Os\Test\Model\User; 
class Register {

  private $userModel;

  public function __construct() {
    $this->userModel=new User ;
  }
  public function showRegister(){
    View::Render('register.php');
  }
   
  public function handelRegister(){
    $userData=filter_input_array(INPUT_POST);
   if( $this->userModel->findByUserName($userData['username'])){
  
              throw new \Exception("User alredy exists");
        }
    
  }

}
