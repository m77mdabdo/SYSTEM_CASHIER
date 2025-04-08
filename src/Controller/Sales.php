<?php 

namespace Os\Test\Controller ;

use Os\Test\Model\Category;
use Os\Test\Model\Menu;
use Os\Test\Model\Order;
use Os\Test\public\Session;
use Os\Test\View;

class Sales {
    private $category;
    private $menu;

    private $order ;
    private $session ;

    public function __construct(){
        $this->category= new Category();
        $this->menu = new Menu();
        $this->order =new Order();
        $this->session =new Session() ;

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

    public function showReceipt($id){
       $orderList = $this->order->getOrderList($id);
       $orderItem = $this->order->getOrderItem($id);
       $processdBy  =$this->session->getSession('username') ;
       View::Render('receipt.php', [
        'orderList' => $orderList,
        'orderItem' => $orderItem,
        'processdBy' => $processdBy
    ]);
    
    }

    public function deleteOrder($id){
       echo  $this->order->rollback($id) ;
    }
}