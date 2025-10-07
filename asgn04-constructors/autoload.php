<?php

function autoload($class)
{
  if (preg_match('/\A\w+\Z/', $class)) {

    include 'classes/' . strtolower($class) . '.class.php';
  }
}
spl_autoload_register('autoload');

$newBird = new Bird([
  'commonName' => 'Acadian Flycatcher',
]);

echo 'Common Name: ' . $newBird->commonName;
