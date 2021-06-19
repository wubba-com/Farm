<?php

interface DivisionInterface {
    public function createAnimal(): Animal;
    public function countProduct(): void;
    public function getProductDivision(): int;
    public function addAnimal(Animal $animal);
}