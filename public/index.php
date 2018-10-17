<?php
include $_SERVER['DOCUMENT_ROOT'] . "/../config/main.php";
include $_SERVER['DOCUMENT_ROOT'] . "/../services/Autoloader.php";


spl_autoload_register([new \app\services\Autoloader(), 'loadClass']);

$product = new \app\models\Product();

var_dump($product->GetAll());

//$product->insertNewProduct();

//var_dump($product->GetAll());



//$product->deleteById(9);
//var_dump($product->GetOne(1));
//var_dump($product->GetAll());
