<?php

class Bird
{
    public $commonName;
    public $food;
    public array $nestPlacement;
    public array $conservationLevel;

    public function __construct($name)
    {
        $nestPlacement = ['ground', 'trees', 'holes in the ground'];
        $conservationLevel = ['high', 'medium', 'low'];
        $foodArr = ['small seeds', 'berries', 'buds', 'insects'];
        $this->commonName = $name;
        $this->food = $foodArr;
        $this->nestPlacement = $nestPlacement;
        $this->conservationLevel = $conservationLevel;
    }

    public function song()
    {
        $lyrics = [
            'highway to the dangerzone',
            'i will survive heyyyay',
            'just a small town girl'
        ];

        $randInt = rand(1, 99);

        switch ($randInt) {
            case $randInt <= 33:
                echo ("{$this->commonName} sings: $lyrics[0]");
                break;
            case $randInt > 33 && $randInt <= 66:
                echo ("{$this->commonName} sings: $lyrics[1]");
                break;
            case $randInt > 66:
                echo ("{$this->commonName} sings: $lyrics[2]");
                break;
        }
    }

    public function canFly()
    {
        $canFlyArr = ['This bird can fly', 'This bird cannot fly'];

        if ($this->commonName == 'Eastern Towhee' || $this->commonName == 'Indigo Bunting') {
            echo ($canFlyArr[0]);
        } else {
            echo ($canFlyArr[1]);
        }
    }

    public function nestPlacementEcho()
    {
        if ($this->commonName == 'Eastern Towhee') {
            echo ("This bird nest in: {$this->nestPlacement[1]}");
        } else if ($this->commonName == 'Indigo bunting') {
            echo ("This bird nest in: {$this->nestPlacement[0]}");
        } else {
            echo ("This bird nest in: {$this->nestPlacement[0]}");
        }
    }

    public function getFood()
    {
        if ($this->commonName == 'Eastern Towhee') {
            echo ("This bird eats {$this->food[0]}, and {$this->food[2]}");
        } else if ($this->commonName == 'Indigo bunting') {
            echo ("This bird eats {$this->food[0]} , and {$this->food[1]}");
        } else {
            echo ("This bird eats: {$this->food[3]}");
        }
    }

    public function getConservationLevel()
    {
        if ($this->commonName == 'Eastern Towhee') {
            echo ("Conservation Level: {$this->conservationLevel[0]}");
        } else if ($this->commonName == 'Indigo Bunt') {
            echo ("Conservation Level: {$this->conservationLevel[1]}");
        } else {
            echo ("conservation level: {$this->conservationLevel[2]}");
        }
    }

    public function describeBird()
    {
        $this->song();
        echo ("<br>");
        $this->canFly();
        echo ("<br>");
        $this->nestPlacementEcho();
        echo ("<br>");
        $this->getFood();
        echo ("<br>");
    }
}

$indigo = new Bird("Indigo Bunting");
$towhee = new Bird("Eastern Towhee");
$randomBird = new Bird("Random Bird");

$birdArr = [$indigo, $towhee, $randomBird];

for ($i = 0; $i < sizeof($birdArr); $i++) {
    $birdArr[$i]->describeBird();
    echo ("<hr>");
}

