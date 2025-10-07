<?php

class Bird
{
  public $habitat;
  public $food;
  public $nesting = "tree";
  public $conservation;
  public  $song = "chirp";
  public  $flying = "yes";
  public static $instanceCount = 0;
  public static $eggNum = "0";

  public static function create($habitat, $food, $nesting, $conservation, $song, $flying): Bird
  {
    self::$instanceCount++;
    $bird = new Bird();
    $bird->habitat = $habitat;
    $bird->food = $food;
    $bird->nesting = $nesting;
    $bird->conservation = $conservation;
    $bird->song = $song;
    $bird->flying = $flying;
    return $bird;
  }

  public static function getInstanceCount(): int
  {
    return self::$instanceCount;
  }

  function can_fly(): string
  {
    return $this->flying == "yes" ? "bird can fly" : "cannot fly and it stuck on the ground";
  }
}

class YellowBelliedFlyCatcher extends Bird
{
  public $name = "yellow-bellied flycatcher";
  public $diet = "mostly insects.";
  public $song = "flat chilk";
  private static string $egg_num = "3-4, sometimes 5.";
}

class Kiwi extends Bird
{
  public $name = "kiwi";
  public $diet = "omnivorous";
  public $flying = "no";
}
