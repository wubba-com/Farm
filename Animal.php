<?php

/*
Созданию интерфейс класса для того что бы данные методы были 
реализованы для дальнейшей регистрации животного на ферме и их обработки

*/
interface iAnimal {

    public function __construct($type);

    public function getTypeAnimal() : string;

    public function getProductQuantity() : int;

    public function setBringingProductsToOneAnimal($min, $max);
}

/*
Создается объект животного со своими характеристами и типом
*/
class Animal implements iAnimal {
    protected string $type;
    protected int $productQuantity;

    public function __construct($type)
    {
        $this->type = $type;
    }

    public function getTypeAnimal() : string
    {
        return $this->type;
    }

    public function getProductQuantity() : int
    {
        return $this->productQuantity;
    }

    /*
    Вообще характеристику о том сколько какое количество может дать животное, я решил вывести в класс Animal, потому что это все таки свойственно животному
    Данный метод реализует количество в диапозоне, сколько может дать продукции одна корова, коза или курица за один надой или кладку итд
    */
    public function setBringingProductsToOneAnimal($min, $max) {

        if(is_string($min) || is_string($max) || is_array($min) || is_array($max)) {
                throw new Exception();
            } else {
                $this->productQuantity = rand($min, $max);
            }
    }
}