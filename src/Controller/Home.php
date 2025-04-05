<?php  

namespace Os\Test\Controller;

use Os\Test\View;

class Home{
    public function index(){
        View::Render('home.php');
    }
}
