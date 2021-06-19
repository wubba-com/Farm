<?php

// Паттерн строитель https://refactoring.guru/ru/design-patterns/builder
abstract class Builder {
    abstract public function buildCowshed(DivisionInterface $division): void;
    abstract public function buildChickenCoop(DivisionInterface $division): void;

    public function getResult(): Farm {
        return $this->farm;
    }
}