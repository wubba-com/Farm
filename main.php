<?php

error_reporting(E_ALL);

require_once 'Animal.php';
require_once 'FarmInterface.php';
require_once 'Farm.php';


$farm = new Farm();

$cowshed = new Cowshed();

$chikenCoop = new СhickenСoop();


for ($i = 0; $i < 10; $i++) {
    $farm->addAnimal($cowshed->createAnimal());
    $farm->addAnimal($chikenCoop->createAnimal());
}

$farm->CountOfDivisionProducts();

echo '<pre>'; print_r($farm->getBarn()); echo '</pre>';
echo '<pre>'; print_r($farm->getProductsDepartament()); echo '</pre>';
echo $farm->totalProduct();

