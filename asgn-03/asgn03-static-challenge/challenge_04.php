<?php
class Bicycle
{
  const WHEELS = 2;

  private static int $instanceCount = 0;
  private static float $totalWeight = 0.0;
  private static array $allBicycles = [];

  public function __construct(
    public string $brand,
    public string $model,
    public int $year,
    public string $description = 'Used bicycle',
    private float $weight_kg = 0.0
  ) {
    self::$instanceCount++;
    self::$totalWeight += $this->weight_kg;
    self::$allBicycles[] = $this;
  }

  public static function getInstanceCount(): int
  {
    return self::$instanceCount;
  }

  public static function getTotalWeight(): string
  {
    return self::$totalWeight . ' kg';
  }

  public static function getAverageWeight(): string
  {
    if (self::$instanceCount === 0) return '0 kg';
    $average = self::$totalWeight / self::$instanceCount;
    return round($average, 2) . ' kg';
  }

  public static function getAllBicycles(): array
  {
    return self::$allBicycles;
  }

  public static function listAllBicycles(): void
  {
    echo "<h3>All Bicycles Created:</h3>";
    foreach (self::$allBicycles as $index => $bike) {
      echo ($index + 1) . ". " . $bike->name() . "<br>";
    }
  }

  public function getProperties()
  {
    $propsArray = [
      $this->brand,
      $this->model,
      $this->year,
      $this->description,
      $this->weight_kg
    ];
    for ($i = 0; $i < count($propsArray); $i++) {
      echo " " . $propsArray[$i] . " ";
    }
  }

  public function name(): string
  {
    return $this->brand . " " . $this->model . " (" . $this->year . ")";
  }

  public function wheel_details(): string
  {
    $wheel_string = static::WHEELS == 1 ? "1 wheel" : static::WHEELS . " wheels";
    return "It has " . $wheel_string . ".";
  }

  public function weight_kg(): string
  {
    return $this->weight_kg . ' kg';
  }

  public function set_weight_kg(float $value): void
  {
    self::$totalWeight -= $this->weight_kg;
    $this->weight_kg = $value;
    self::$totalWeight += $this->weight_kg;
  }

  public function weight_lbs(): string
  {
    $weight_lbs = $this->weight_kg * 2.2046226218;
    return round($weight_lbs, 2) . ' lbs';
  }

  public function set_weight_lbs(float $value): void
  {
    $kg_value = $value / 2.2046226218;
    $this->set_weight_kg($kg_value);
  }
}

class Unicycle extends Bicycle
{
  const WHEELS = 1;

  private static int $unicycleCount = 0;

  public function __construct(
    string $brand = 'Generic',
    string $model = 'Unicycle',
    int $year = 2024,
    string $description = 'Used unicycle',
    float $weight_kg = 0.0
  ) {
    parent::__construct($brand, $model, $year, $description, $weight_kg);
    self::$unicycleCount++;
  }

  public static function getUnicycleCount(): int
  {
    return self::$unicycleCount;
  }

  public static function getComparisonStats(): string
  {
    $totalBikes = parent::getInstanceCount();
    $unicycles = self::$unicycleCount;
    $bicycles = $totalBikes - $unicycles;

    $percentage = $totalBikes > 0 ? round(($unicycles / $totalBikes) * 100, 1) : 0;

    return "Bicycles: {$bicycles}, Unicycles: {$unicycles} ({$percentage}% are unicycles)";
  }
}

$trek = new Bicycle('Trek', 'Emonda', 2017, 'Road bike', 8.5);
$specialized = new Bicycle('Specialized', 'Tarmac', 2020, 'Racing bike', 7.8);
$uni = new Unicycle('Nimbus', 'Oracle', 2021, 'Mountain unicycle', 5.2);

echo "<h2>Comparison Stats:</h2>";
echo "  " . Unicycle::getComparisonStats() . "  ";

echo "<h2>Instance Counts:</h2>";
echo "Total bicycles created: " . Bicycle::getInstanceCount() . "<br>";
echo "Total unicycles created: " . Unicycle::getUnicycleCount() . "<br>";


echo "<h2>Weight Statistics:</h2>";
echo "Total weight of all bicycles: " . Bicycle::getTotalWeight() . "<br>";
echo "Average weight: " . Bicycle::getAverageWeight() . "<br>";

echo "<h2>Individual Bicycle Details:</h2>";
echo "Bicycle: " . $trek->wheel_details() . "<br>";
echo "Unicycle: " . $uni->wheel_details() . "<br>";

echo "<hr>";
Bicycle::listAllBicycles();

echo "<hr>";
echo "<h2>Weight Testing:</h2>";
echo "Trek original weight: " . $trek->weight_kg() . "<br>";
echo "Average before weight change: " . Bicycle::getAverageWeight() . "<br>";

$trek->set_weight_kg(10.0);
echo "Trek new weight: " . $trek->weight_kg() . "<br>";
echo "Average after weight change: " . Bicycle::getAverageWeight() . "<br>";

echo $trek->weight_lbs() . "<br>";
