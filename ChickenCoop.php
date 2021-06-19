<?php

// Конкретная реализация паттерна МОСТ и фабричный метод createAnimal
class СhickenСoop extends Division implements DivisionInterface {

    // фабричный метод
    public function createAnimal(): Animal {
        return new Chicken();
    }

    public function addAnimal(Animal $animal) {
        $this->animals[] = $animal;
    }

    public function countProduct(): void {
        foreach ($this->animals as $animal) {
            $this->countProduct += $animal->getCountProduct();
        }
    }

    public function getProductDivision(): int {
        return $this->countProduct;
    }
}