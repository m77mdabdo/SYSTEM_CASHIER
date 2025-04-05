<?php 

namespace Os\Test\Model;

use Os\Test\public\Model;

class User extends Model{

    protected $tableName ='users';
    public function Register($user){
        $query = "INSERT INTO $this->tableName (firstname ,lastname ,username ,middlename,password)
        VALUES (:firstname ,:lastname ,:username ,:middlename,:password) " ;

        $this->query($query);
        $this->bind(":username" ,$user['username']) ;
        $this->bind(":firstname" ,$user['firstname']) ;
        $this->bind(":lastname" ,$user['lastname']) ;
        $this->bind(":middlename" ,$user['middlename']) ;
        $this->bind(":password", password_hash($user['password'], PASSWORD_DEFAULT));
        
        return $this->execute() ? true : false ;

    }
    
    public function findByUserName($username){
      $query= " select * from $this->tableName where username = :username";
      $this->query($query);
      $this->bind(':username',$username);
      $row = $this->single();
      return !empty($row) ? true: false ;

    }

    public function Login($username,$password){

      $query= " select * from $this->tableName where username = :username";
      $this->query($query);
      $this->bind(':username',$username);
       $row = $this->single();
   
       if($row){
        $hash_password= $row->password;
        if(password_verify($password,$hash_password)){
            return $row ;
        }else{
            return false  ;
        }
       }

    }
}