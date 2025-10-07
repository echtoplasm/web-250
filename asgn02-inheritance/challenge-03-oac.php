<?php

class Car
{
    protected $color;
    public function startEngine()
    {
        echo "engine started!";
    }

    public function setColor(string $color)
    {
        if (empty(trim($color))) {
            throw new InvalidArgumentException("Color cannot be empty");
        }
        $this->color = $color;
    }

    public function getColor(): string
    {
        return $this->color ?? '';
    }
}

class Ferrari extends Car
{
    private $brand = "Ferrari";
    private $model;
    private $price;

    public function __construct(string $model, string $color, float $price)
    {
        if (!empty($model)) {
            $this->setModel($model);
        }

        if (!empty($color)) {
            $this->setColor($color);
        }

        if ($price !== null) {
            $this->setPrice($price);
        }
    }

    public function setModel(string $model)
    {
        if (empty(trim($model))) {
            throw new InvalidArgumentException("Model cannot be empty");
        }
        $this->model = $model;
    }

    public function setPrice(float $price)
    {
        if ($price < 0) {
            throw new InvalidArgumentException("Price cannot be less than 0");
        }

        $this->price = $price;
    }

    public function getModel(): string
    {
        return $this->model ?? "";
    }

    public function getPrice(): float
    {
        return $this->price ?? 0.0;
    }

    public function outPutInformation()
    {
        echo ("This  " . $this->color . " " . $this->brand . " " . $this->model . " costs: " . "  $" . $this->price);
    }
}

class Honda extends Car
{
    private $brand = "Honda";
    private $model;
    private $price;

    public function __construct(string $model, string $color, float $price)
    {
        if (!empty($model)) {
            $this->setModel($model);
        }

        if ($price !== null) {
            $this->setPrice($price);
        }

        if (!empty($color)) {
            $this->setColor($color);
        }
    }

    public function setModel(string $model)
    {
        if (empty($model)) {
            throw new InvalidArgumentException("Model cannot be empty");
        }

        $this->model = $model;
    }

    public function getModel(): string
    {
        return $this->model ?? " ";
    }

    public function setPrice(float $price)
    {
        if ($price <= 0) {
            throw new InvalidArgumentException("Price must be greater than 0");
        }

        $this->price = $price;
    }

    public function getPrice(): float
    {
        return $this->price ?? 0.0;
    }

    public function outPutInformation()
    {
        echo ("This  " . $this->color . " " . $this->brand . " " . $this->model . " costs: " . "  $" . $this->price);
    }
}

function echoHr(){
    echo('<hr>');
}

$ferrariModels = ["Spider", "296 GTS", "812"];
$ferrariPrices = array(
    $ferrariModels[0] => 1200000.00,
    $ferrariModels[1] => 1300000.00,
    $ferrariModels[2] => 900000.00
);
$carColors = ["Red", "Blue", "Green"];

$hondaModels = ["Accord", "Civic", "CRV"];
$hondaPrices = array(
    $hondaModels[0] => 20000.00,
    $hondaModels[1] => 12000.00,
    $hondaModels[2] => 22000.00
);

for ($i = 0; $i < count($ferrariModels); $i++) {
    $newCar = new Ferrari($ferrariModels[$i], $carColors[$i], $ferrariPrices[$ferrariModels[$i]]);
    $newCar->outPutInformation();
    echo('<br>');
}

echoHr();

for ($i =0; $i<count($hondaModels); $i++){
    $newHonda = new Honda($hondaModels[$i], $carColors[$i], $hondaPrices[$hondaModels[$i]]);
    $newHonda->outPutInformation();
    echo('<br>');
}


