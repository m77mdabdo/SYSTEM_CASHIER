<?php 

namespace Os\Test\Model;

use Os\Test\public\Model;

class Category extends Model{
    protected $tableName ='category_list';
      

    public function getAllcategories(){
        $query= " SELECT * FROM $this->tableName  WHERE status =1  AND  delete_flag =0  ORDER BY name ASC  " ;
        $this-> query($query);
        return $this->resultSet();
    }
}