<?php 

namespace Os\Test\Model;

use Os\Test\public\Model;

class User extends Model{

    protected $tableName ='users';
    public function Register($user){

    }
    
    public function findByUserName($username){
      $query= " select * from $this->tableName where username = :username";
      $this->query($query);
      $this->bind(':username',$username);
      $row = $this->single();
      return !empty($row) ? true: false ;

    }

    public function Login(){

    }
}