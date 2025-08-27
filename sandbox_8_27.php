<?php 

class Car {
    public $color;
    public $make;
    public $model; 
    public function honk() {
        echo "beep beep!";
    }
}

$myCar = new Car; 

$myCar -> make = "Mitsubishi";
$myCar -> model = "Lancer";


function carFactory($color, $make,  $model){
        $newCar = new Car;
        $newCar -> make = $make;
        $newCar -> color = $color;
        $newCar -> model = $model;

        return $newCar;            
    }


$blueNissan = carFactory('blue', 'Nissan', 'Altima');

echo($blueNissan->color . " " . $blueNissan->make . " " . $blueNissan->model);


$numArr = [];

for($i = 0; $i < 26; $i++){
    array_push($numArr, [$i]);
}

function obfuscate($str, $numArray) {
    $alpha = ['a', 'b', 'c', 'd', 'e', 'f', 
              'g', 'h' ,'i', 'j', 'k', 'l',
              'n', 'o', 'p', 'q', 'r', 's', 't', 
              'u' , 'v','w', 'x', 'y', 'z'];

    $strArr =  str_split($str);
    $alphaNumMap = [];

    for($i = 0; $i < count($alpha); $i++){
        $alphaNumMap[$alpha[$i]] = $numArray[$i];
    }

    $obfuscatedArr = [];
    
    for($i = 0; $i <  count($strArr); $i++){
        forEach($alphaNumMap as $key => $value) {
            if($strArr[$i] === $key){
                array_push($obfuscatedArr, $value);
            }
        }
    }

    return $obfuscatedArr;

}

print_r(obfuscate("Hello", $numArr));


