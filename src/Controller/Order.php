<?php 

namespace Os\Test\Controller ;

use Os\Test\Model\Order as ModelOrder;
use Os\Test\View;

class Order {
    private $order ;

    public function __construct(){
        $this->order =new ModelOrder ;
    }
    public function allOrders(){
        $orders=$this->order->getOrders();
        View::Render('orders.php',['orders'=>$orders]) ;
    }

    public function viweReceipt($id){
        
    }
}