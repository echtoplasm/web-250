<?php 

function outputLineBreak(){
  print '<hr>';
}


class Bird{
  public $commonName;
  public $latinName;


  public function __construct($commonName, $latinName){
    $this->commonName = $commonName;
    $this->latinName = $latinName;
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

$robin = new Bird('Robin', 'Turdus migratorius');
$towhee = new Bird('Eastern Towhee', 'Piplio erythrophthalmus');

$robin -> outputProps();
$towhee -> outputProps();



