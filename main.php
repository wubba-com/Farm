<?php

error_reporting(E_ALL);

require_once 'Animal.php';
require_once 'Farm.php';

$farm = new Farm();


$an1 = new Animal("cow"); 
$an2 = new Animal("cow");
$an3 = new Animal("cow");
$an4 = new Animal("cow");
$an5 = new Animal("cow");
$an6 = new Animal("cow"); 
$an7 = new Animal("cow"); 
$an8 = new Animal("cow"); 
$an9 = new Animal("cow"); 
$an10 = new Animal("cow");

$ch1 = new Animal("chiken");
$ch2 = new Animal("chiken");
$ch3 = new Animal("chiken");
$ch4 = new Animal("chiken");
$ch6 = new Animal("chiken");
$ch7 = new Animal("chiken");
$ch8 = new Animal("chiken");
$ch9 = new Animal("chiken");

$goat1 = new Animal("goat");
$goat2 = new Animal("goat");
$goat3 = new Animal("goat");
$goat4 = new Animal("goat");
$goat5 = new Animal("goat");



/* Животных которые мы купили */
$animals = [
    $an1, $an2, $an3, $an4, $an5, 
    $an6, $an7, $ch1, $ch2, $ch3, 
    $ch4, $ch6, $goat1, $goat2,
    $goat3, $goat4, $goat5,
];



/* Здесь мы их привезли на ферму и добавляем)) */
foreach ($animals as $animal) {
    if($animal->getTypeAnimal() == 'cow') {
        try {
            $animal->setBringingProductsToOneAnimal(10, 12);
        } catch (Exception $e) {
            die('Значение должно быть число!');
        }
    }
    if ($animal->getTypeAnimal() == 'chiken') {
        try {
            $animal->setBringingProductsToOneAnimal(0, 1);
        } catch (Exception $e) {
            die('Значение должно быть число!');
        }
    }
    if ($animal->getTypeAnimal() == 'goat') {
        try {
            $animal->setBringingProductsToOneAnimal(4, 7);
        } catch (Exception $e) {
            die('Значение должно быть число!');
        }
        
    }
    $farm->addAnimal($animal);
}


echo 'Весь список скота на ферме: <br>';
echo '<pre>';
print_r($farm->getAnimal());
echo '</pre>'; 

echo 'Начался cбор продукции...' . '<br>';

$farm->collectProducts();
echo '<pre>';
print_r($farm->getCollectProduct());
echo '</pre>';

echo 'Закончился cбор продукции...' . '<br>';

echo "Всего продукции на ферме: " . $farm->totalProduct() . '<br>';