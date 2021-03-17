<?php

/* 
Класс фермы  автономный, сам ведет учёт номеров животных, собирает продукцию и ведет ее подсчет. 
*/
class Farm {

    protected array $animals = [];
    private array $productsFromDepartament = [];
    private int $i = 0;
    
    /*
    В данном методе мы можем добавлять любой тип животных объекта Animal и также они будут группироваться по своему типу. При добавления животного происходит его регистраця на ферме и вносятся его хаарктеристики.
    */
    public function addAnimal(Animal $animal) {
        $newRegisteredAnimal = [
            'ID' => $animal->getTypeAnimal() . substr((string) time(), 5) . rand(999, 99999),
            'type' => $animal->getTypeAnimal(),
            'countProduct' => $animal->getProductQuantity()
        ];
        if(array_key_exists($animal->getTypeAnimal(), $this->animals)) {
            $this->animals[$animal->getTypeAnimal()][$this->i] = $newRegisteredAnimal;
            $this->i++;
        } else {
            $this->i = 0;
            $this->animals[$animal->getTypeAnimal()] = [$this->i => $newRegisteredAnimal];
            $this->i++;
        }

    }

    /*
    Метод собирает продукцию в каждом отделе
    */
    public function collectProducts() {
        
        foreach ($this->animals as $key => $animal) {
            $countPropuctDepartament = 0;
            foreach ($animal as $value) {
                $countPropuctDepartament += $value['countProduct'];
            }

            $this->productsFromDepartament[$key] = $countPropuctDepartament;
        }
    }

    /*
    Метод подсчитывает общее количество продукции в единицах
    */
    public function totalProduct() {
        return array_sum($this->productsFromDepartament);
    }

    /*
    Можно посмотреть сколько и какие животные живут на ферме, так же их ID и характкристики
    */
    public function getAnimal() : array {
        return $this->animals;
    }

    /*
    Метод показывает сколько продукции собрали в каждом отделе
    */
    public function getCollectProduct() : array {
        return $this->productsFromDepartament;
    }

}