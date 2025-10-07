<?php
class Bird
{
  public $id;  
  public $common_name;
  public $habitat;
  public $food;
  public $conservation_id;
  public $backyard_tips;
 

  public const CONSERVATION_OPTIONS = [
    1 => 'Low concern',
    2 => 'Moderate concern',
    3 => 'Extreme concern',
    4 => 'Extinct'
  ];

  public function __construct($args = [])
  {
    $this->id = $args['id'] ?? null; 
    $this->common_name = $args['common_name'] ?? '';
    $this->habitat = $args['habitat'] ?? '';
    $this->food = $args['food'] ?? '';
    $this->conservation_id = $args['conservation_id'] ?? '';
    $this->backyard_tips = $args['backyard_tips'] ?? '';
  }

  public function conservation()
  {
    if ($this->conservation_id >= 1 && isset(self::CONSERVATION_OPTIONS[$this->conservation_id])) {
      return self::CONSERVATION_OPTIONS[$this->conservation_id];
    } else {
      return "Unknown Conservation Status";
    }
  }
}
?>
