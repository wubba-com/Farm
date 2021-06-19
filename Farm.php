<?php

/* 
Класс фермы  автономный, сам ведет учёт номеров животных, собирает продукцию и ведет ее подсчет. 

Класс Farm является абстракцией в паттерне Мост https://refactoring.guru/ru/design-patterns/bridge
*/

class Farm  {
    private array $productsDivisions;
    protected array $divisions;

    public function __construct() {
        $this->divisions = [];
        $this->productsDivisions = [];
    }

    /*
    Метод добавяет подразделение к себе на ферму. Будь это коровник или курятник итд
    */
    public function addDivision(DivisionInterface $division) {
        $this->divisions[get_class($division)] = $division;
    }

    public function getDivision() {
        return $this->divisions;
    }

    /*
    В данном методе единственным параметром является подразделение, которое производит своих животных.
    Далее мы делегируем уже обязаности создания животных на это подразделение
    */
    public function addAnimal(DivisionInterface $division) {
        $division->addAnimal($division->createAnimal());
    }

    /*
    Метод собирает продукцию в каждом отделе. Ферма делегирует обязанность подсчитать количество продуктов СВОИМ подразделениям
    */
    public function CountOfDivisionProducts() {
        foreach ($this->divisions as $key => $division) {
            $division->countProduct();
            $this->productsDivisions[$key] = $division->getProductDivision();
        }
    }

    /*
    Метод возвращает количество продуктов которые находятся в разных подразделениях
    */
    public function getProductsDepartament() {
        return $this->productsDivisions;
    }

    /*
    Метод подсчитывает общее количество продукции в единицах
    */
    public function totalProduct() {
        return array_sum($this->productsDivisions);
    }
}
