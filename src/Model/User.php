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
    public function getAllUsers(){
        $query = "SELECT * FROM $this->tableName   ";
        $this->query($query);
        return $this->resultSet();
    }

    public function create($userData){
        if (empty($userData['firstname']) || empty($userData['lastname']) || empty($userData['username'])) {
            return json_encode(['status' => 'fail', 'msg' => 'All fields are required']);
        }
        $query = "INSERT INTO $this->tableName (firstname, middlename, lastname, username, avatar, type, status)
                  VALUES (:firstname, :middlename, :lastname, :username, :avatar, :type, :status)";
        $this->query($query);
        $this->bind(':firstname', $userData['firstname']);
        $this->bind(':middlename', $userData['middlename']);
        $this->bind(':lastname', $userData['lastname']);
        $this->bind(':username', $userData['username']);
        $this->bind(':avatar', $userData['avatar']);
        $this->bind(':type', $userData['type']);
        $this->bind(':status', $userData['status']);
        return $this->execute() ? json_encode(['status' => 'success', 'msg' => 'User created successfully']) : json_encode(['status' => 'fail', 'msg' => 'User creation failed']);
    }

    public function getUserByUsername($username){
        $query = "SELECT * FROM $this->tableName WHERE username = :username ";
        $this->query($query);
        $this->bind(':username', $username);
        return $this->single();
    }

    public function updateUser($userData, $username){
        $query = "UPDATE $this->tableName SET firstname = :firstname, middlename = :middlename, lastname = :lastname, avatar = :avatar, type = :type, status = :status WHERE username = :username";
        $this->query($query);
        $this->bind(':firstname', $userData['firstname']);
        $this->bind(':middlename', $userData['middlename']);
        $this->bind(':lastname', $userData['lastname']);
        $this->bind(':avatar', $userData['avatar']);
        $this->bind(':type', $userData['type']);
        $this->bind(':status', $userData['status']);
        $this->bind(':username', $username);
        return $this->execute();
    }

    public function deleteUser($username){
        $query = "UPDATE $this->tableName SET delete_flag = 1 WHERE username = :username";
        $this->query($query);
        $this->bind(':username', $username);
        return $this->execute();
    }
  
}