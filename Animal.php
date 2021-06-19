<?php

// Класс животных которые будут создаваться фабричным методом классами реализующие интерфейс DivisionInterface
abstract class Animal {

    protected int $countProduct;

    public function getCountProduct(): int {
        return $this->countProduct;
    }

    public function setCountProductsOneAnimal(int $count): void {
        $this->countProduct = $count;
    }
    
}

// Конкретные животные
class Cow extends Animal {
    protected int $countProduct = 10;

}

class Chicken extends Animal {
    protected int $countProduct = 4;
}