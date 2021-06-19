<?php

abstract class Division {
    
    protected array $animals;
    protected int $countProduct;

    public function __construct() {
        $this->countProduct = 0;
        $this->animals = [];
    }
    
}