<?php 

namespace Os\Test\Controller;
use Os\Test\public\Session;
use Os\Test\View;
use Os\Test\Model\User; 
use Os\Test\public\Request;
class Login {

  private $userModel;
  private $session ;

  public function __construct() {
    $this->userModel=new User ;
    $this->session= new Session ;
  }
  public function showLogin(){
    View::Render('login.php');
  }
   
  public function handelLogin(){
    $userData=filter_input_array(INPUT_POST);
   $loginUser =  $this->userModel->Login($userData['username'],
      $userData['password']
      );

      

      if($loginUser){
        $this->createUserSession($loginUser);
        Request::redirect('home/index');
      }else{

         Request::redirect('login/showLogin');
         
      } 
    
  }
  public function createUserSession($user){
    $this->session->setSession('user_id',$user->id);
    $this->session->setSession('username',$user->username);
  }

}
