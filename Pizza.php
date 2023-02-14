<?php

namespace App;

class Pizza {
  public $type;
  public $ingredients;
  public $size;

  public function __construct($type, $ingredients, $size) {
    $this->type = $type;
    $this->ingredients = $ingredients;
    $this->size = $size;
  }

  public function get_price() {
    $price = 0;

    switch ($this->size) {
      case 'small':
        $price = 10;
        break;
      case 'medium':
        $price = 15;
        break;
      case 'large':
        $price = 20;
        break;
    }

    return $price;
  }
}
