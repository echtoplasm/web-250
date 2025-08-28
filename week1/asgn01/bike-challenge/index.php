<?php

class Bicycle
{
    public $brand;
    public $model;
    public $year;
    public $description;
    public $weight_kg;

    public function __construct($brand, $model, $year, $description, $weight_kg, $unit = 'kg')
    {
        $this->brand = $brand;
        $this->model = $model;
        $this->year = $year;
        $this->description = $description;

        if ($unit === 'lbs') {
            $this->weight_kg = $weight_kg / 2.20462;
        } else {
            $this->weight_kg = $weight_kg;
        }
    }

    public function name()
    {
        echo ("I am a {$this->brand} {$this->model} {$this->year}");
    }

    /* 
    
    Kevins weight conversion is super pedantic.   
    
    heres my code showing i know how to write the OOP methods, but having 2 functions to convert weight is insane, when you can just write a conditional constructor(see line 18-22)
 
    public function weight_lbs(){
        return $this->weight * 2.20462;
    }

    public function weight_back_to_kgs(){
        $weight_lbs = $this -> weight_lbs();
        return $weight_lbs/2.20462
    }     

    */
}

$brandArr = ["Biker", "Tonka", "Toyo", "Honda"];
$modelArr = ["Newdigs", "HoppedUp", "KewlKid", "ThisKidsGonnaHaveANoseRingOneDay"];
$year = ["1997", "2001", "1956", "1967"];
$descriptions = ["A cool bike", "A cooler bike", "A lame bike", "I have no idea"];
$weightArr = [123, 124, 125, 129];
$unitArr = ["kg", "lbs"];

for ($i = 0; $i < sizeof($modelArr); $i++) {
    if ($i % 2 == 0) {
        $unit == 'kg';
    } else {
        $unit == 'lbs';
    }
    
    $someBike = new Bicycle(
                    $brandArr[$i], 
                    $modelArr[$i], 
                    $year[$i], 
                    $descriptions[$i], 
                    $weightArr[$i], 
                    $unit);
   $someBike -> name();
    echo("<br>"); 
};
