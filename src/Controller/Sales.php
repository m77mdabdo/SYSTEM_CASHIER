<?php 

namespace Os\Test\Controller ;

use Os\Test\Model\Category;
use Os\Test\Model\Menu;
use Os\Test\Model\Order;
use Os\Test\View;

class Sales {
    private $category;
    private $menu;

    private $order ;

    public function __construct(){
        $this->category= new Category();
        $this->menu = new Menu();
        $this->order =new Order();

    }
    public function showSale(){
        $allCategories = $this->category->getAllcategories();
        $allMenues =$this->menu->getAllMenues();
        View::Render('sales.php',['allcategories'=>$allCategories,'allMenues'=>$allMenues]);
    }

    public function makeorder(){
        $orderData = filter_input_array(INPUT_POST);
      echo  $this->order->placeOrder($orderData);

    }
}