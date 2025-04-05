<?php 

namespace Os\Test\Model;

use Os\Test\public\Model;

class Menu extends Model{
    protected $tableName ='menu_list';
      

    public function getAllMenues(){
        $query= " SELECT * FROM $this->tableName  WHERE status =1  AND delete_flag =0  ORDER BY name ASC  " ;
        $this-> query($query);
        return $this->resultSet();
    }
}