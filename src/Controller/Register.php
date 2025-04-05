<?php 

namespace Os\Test\Controller;
use Os\Test\View;
use Os\Test\Model\User; 
use Os\Test\public\Request;
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
              // Request::redirect('register/showRegister');
          
        }
        $passwoedHash= password_hash($userData['password'], PASSWORD_BCRYPT);

        $user =[
                'firstname'=>$userData['firstname'],
                'lastname'=>$userData['lastname'],
                'middlename'=>$userData['middlename'],
                'username'=>$userData['username'],
                'password'=>$userData['password'],


        ];

      if($this->userModel->Register($user)){
        Request::redirect('login/showLogin');
      }else{

        Request::redirect('register/showRegister');
          
      } 
    
  }

}
