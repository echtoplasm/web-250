<?php

class Car
{
    public $color;
    public function startEngine()
    {
        echo "engine started!";
    }
}

class Ferrari extends Car
{
    public $brand = "Ferrari";
    public $model;
    public $price;

    public function goFast()
    {
        echo " I am a " . $this->color . " " . $this->brand . " " . $this->model . " and I go fast";
    }
}

class Honda extends Car
{
    public $brand = "Honda";
    public $model;
    public $price;

    public function __construct(string $model, float $price)
    {
        $this->setModel($model);
        $this->setPrice($price);
    }

    // ========  model property setter getter ======== 
    // :: probably couldve used setters and getters 
    // :: for the parent class and ferrari too, but oh well.
    // ===============================================
    public function setModel(string $model)
    {
        if (empty($model)) {
            throw new InvalidArgumentException("Model cannot be empty");
        }

        $this->model = $model;
    }

    public function getModel(): string
    {
        return $this->model;
    }

    //price property setter getter 
    public function setPrice(float $price)
    {
        if (empty($price)) {
            throw new InvalidArgumentException("Price cannot be empty");
        }

        $this->price = $price;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function outPutInformation(){
        echo ("This  " . $this -> brand . " " . $this -> model . " costs: " . "  $" . $this->price);
    }
}

$spyder = new Ferrari;
$spyder->color = "red";
$spyder->model = "spyder";
$spyder->startEngine();
$spyder->goFast();

$accord = new Honda("Accord", 23000.00);
echo '</br>';
$accord->outPutInformation();

