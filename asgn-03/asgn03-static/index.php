<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>asgn02 Inheritance</title>
</head>

<body>
  <h1>Inheritance Examples</h1>

  <?php
  include './Bird.php';
  echo "Before: Bird count: " . Bird::getInstanceCount() . "<br>";
  $bird = new Bird();
  echo '<p>The generic song of any bird is "' . $bird->song . '".</p>';

  $bird = Bird::create('forest', 'seeds', 'tree', 'stable', 'chirp', 'yes');
  $flycatcher = YellowBelliedFlyCatcher::create('woods', 'insects', 'tree', 'stable', 'chilk', 'yes');
  $kiwi = Kiwi::create('ground', 'omnivore', 'burrow', 'endangered', 'kiwi', 'no');
  $fly_catcher = new YellowBelliedFlyCatcher();

  echo '<p>The song of the ' . $fly_catcher->name . ' on breeding grounds is "' . $fly_catcher->song . '".</p>';

  $kiwi = new Kiwi();
  $kiwi->flying = "no";
  echo "<p>The " . $fly_catcher->name . " " . $fly_catcher->can_fly() . ".</p>";
  echo "<p>The " . $kiwi->name . " " . $kiwi->can_fly() . ".</p>";

  echo "After: Bird count: " . Bird::getInstanceCount() . "<br>";

  ?>
</body>

</html>
