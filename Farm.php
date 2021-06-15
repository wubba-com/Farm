<?php

/*
Созданию интерфейс класса для того что бы данные методы были 
реализованы для дальнейшей регистрации животного на ферме и их обработки
*/

/*
Создается объект животного со своими характеристами и типом
*/

/* 
Класс фермы  автономный, сам ведет учёт номеров животных, собирает продукцию и ведет ее подсчет. 
*/
require_once 'Animal.php';

class Farm  {

    protected array $barn;
    protected array $productsFromDepartament;

    public function __construct() {
        $this->barn = [];
        $this->productsFromDepartament = [];
    }

    /*
    В данном методе мы можем добавлять любой тип животных объекта Animal и также они будут группироваться по своему типу. При добавления животного происходит его регистраця на ферме и вносятся его хаарктеристики.
    */
    public function addAnimal(Animal $animal) {
        $this->barn[get_class($animal)][] = $animal;
    }

    /*
    Метод собирает продукцию в каждом отделе
    */
    public function CountOfDivisionProducts() {
        foreach ($this->barn as $key => $typeAnimal) {
            $count = 0;
            foreach ($typeAnimal as $animal) {
                $count += $animal->getCountProduct();
            }
            $this->productsFromDepartament[$key] = $count;
        }

    }

    public function getBarn() {
        return $this->barn;
    }

    public function getProductsDepartament() {
        return $this->productsFromDepartament;
    }

    /*
    Метод подсчитывает общее количество продукции в единицах
    */
    public function totalProduct() {
        return array_sum($this->productsFromDepartament);
    }
}

class СhickenСoop extends Farm implements FarmInterface {

    public function createAnimal(): Animal {
        return new Chicken();
    }
}

class Cowshed extends Farm implements FarmInterface {

    public function createAnimal(): Animal {
        return new Cow();
    }
}