<?php

class FarmBuilder extends Builder {
    
    public function __construct(Farm $farm) {
        $this->farm = $farm;
    }

    public function buildCowshed(DivisionInterface $division): void {
        $this->farm->addDivision($division);
    }

    public function buildChickenCoop(DivisionInterface $division): void {
        $this->farm->addDivision($division);
    }
}