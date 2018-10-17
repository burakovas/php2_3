<?php
namespace app\models;

use app\services\Db;

abstract class Model implements IModel
{
    private $db;

    public function __construct(){
        $this->db = Db::getInstance();
    }

    public function getOne($id){                                //Read One
        $table = $this->getTableName();
        $sql = "SELECT * FROM {$table} WHERE id = :id";
        return $this->db->queryOne($sql, [':id' => $id]);
    }

    public function getAll(){                                   //Read All
        $table = $this->getTableName();
        $sql = "SELECT * FROM {$table}";
        return $this->db->queryAll($sql);
    }

    public function deleteByid($id){                            //Delete
        $table = $this->getTableName();
        $sql = "DELETE FROM {$table} WHERE id = :id";
        return $this->db->execute($sql, [':id' => $id]);
    }

   // public function insertNewProduct($newProduct){                         //INSERT New Product    ДОДЕЛАТЬ
   //     $table = $this->getTableName();
   //     var_dump($newProduct);
   //     $sql = "INSERT INTO  {$table} (name, imageName, description, price, brandId) 
   //     VALUES (:name, :imageName, :description, :price, :brandId)";  
   //     return $this->db->execute($sql,[':name' => $newProduct -> $id, 
   //                                     ':imageName' => $newProduct -> $id, 
   //                                     ':description' => $newProduct -> $id, 
   //                                     ':price' => $newProduct -> $id, 
   //                                     ':brandId' => $newProduct -> $id]);
   //}
    
    //public function updateProductById($id){                     //update Product    ДОДЕЛАТЬ
    //    $table = $this->getTableName();
    //    $sql = "UPDATE  {$table} 
    //    SET column1 = value1, column2 = value2, ...
    //    WHERE id = :id";
    //    return $this->db->execute($sql);
    //}
    
}
