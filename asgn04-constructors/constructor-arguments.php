<?php

function outputLineBreak(){
  print '<hr>';
}

class Bird
{
  public string $commonName;
  public string $latinName;

  public function __construct($args)
  {
    $this->commonName = $args['commonName'] ?? 'unknown bird';
    $this->latinName = $args['latinName'] ?? 'Unkown Species';
  }

  public function outputCommonName(){
    print 'Common Name: ' . $this->commonName;
  }

  public function outputLatinName(){
    print 'Latin Name: ' . $this->latinName;
  }
  
  public function outputProps(){
    $this->outputCommonName();
    $this->outputLatinName();
    outputLineBreak();
  }
}

$flyCatcher = new Bird([
  'commonName' => 'Acadian Flycatcher',
  'latinName' => 'Turdus migratorius'
]);

$towhee = new Bird([
  'commonName' => 'Eastern Towhee',
  'latinName' => 'Pipilo erythrophthalmus'
]);

$flyCatcher -> outputProps();
$towhee -> outputProps();

