<?php

// Клиентский код

error_reporting(E_ALL);

require_once 'Animal.php';
require_once 'DivisionInterface.php';
require_once 'AbstractBuilder.php';
require_once 'AbstractDivision.php';
require_once 'Farm.php';
require_once 'FarmBuilder.php';
require_once 'Cowshed.php';
require_once 'ChickenCoop.php';

// Создаем объект фермы
$farm = new Farm();

// Создаем строителя для добавления подразделений
$farmBuilder = new FarmBuilder($farm);

// Что бы реалиовать паттер МОСТ нам нужно, что клиент передал объекты реализации в абстракцию. Этим добавлением занимается Строитель
$cowshed = new Cowshed();
$chikenCoop = new СhickenСoop();

// Создаем строителя и добавляем подразделения на ферму
$farmBuilder->buildCowshed($cowshed);
$farmBuilder->buildChickenCoop($chikenCoop);

// Создаем животных
for ($i = 0; $i < 10; $i++) {
    $farm->addAnimal($cowshed);
}

for ($i = 0; $i < 8; $i++) {
    $farm->addAnimal($chikenCoop);
}


// Подсчитываем какое количество продуктов есть в каждом подразделении и выводим их и выводим общее количество продуктов на ферме
$farm->CountOfDivisionProducts();

echo '<pre>'; print_r($farm->getProductsDepartament()); echo '</pre>';
echo $farm->totalProduct();

