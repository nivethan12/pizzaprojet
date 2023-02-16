<?php

require_once 'Pizza.php';

class PizzaTest extends PHPUnit_Framework_TestCase {
  public function testGetPrice() {
    $pizza = new Pizza("Margherita", 10);
    $this->assertEquals(10, $pizza->get_price());

    $pizza = new Pizza("Pepperoni", 12);
    $this->assertEquals(12, $pizza->get_price());
  }
}
