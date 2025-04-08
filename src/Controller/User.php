<?php

namespace Os\Test\Controller;

use Os\Test\Model\User as modelUser;
use Os\Test\View;

class User {

    private $user;

    public function __construct(){
        $this->user = new modelUser;
    }

    public function getUserList(){
        $users = $this->user->getAllUsers();
        View::Render('userList.php', ['users' => $users]);
    }

    public function makeUser(){
        View::Render('manageUser.php');
    }

    public function createUser(){
        $userData = filter_input_array(INPUT_POST);
        echo $this->user->create($userData);
    }

    public function viewUser($username){
        $user = $this->user->getUserByUsername($username);
        View::Render('viewUser.php', ['user' => $user]);
    }

    public function editUser($username){
        $user = $this->user->getUserByUsername($username);
        View::Render('editUser.php', ['user' => $user]);
    }

    public function updateUser($username){
        $userData = filter_input_array(INPUT_POST);
        echo $this->user->updateUser($userData, $username);
    }

    public function deleteUser($username){
        echo $this->user->deleteUser($username);
    }
}
