<?php
namespace app\models;

class Product extends Model
{
    public $id;
    public $name;
    public $imageName;
    public $description;
    public $price;
    public $brandId;

    public function getTableName(){
        return 'catalog';
    }

    
}
