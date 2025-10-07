<?php

class Bird
{
  public string $commonName;
  public string $latinName;

  public function __construct($args)
  {
    $this->commonName = $args['commonName'] ?? 'unknown bird';
    $this->latinName = $args['latinName'] ?? 'Unkown Species';
  }
}
