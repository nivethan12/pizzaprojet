<?php
namespace App;

use App\Order;
use App\Pizza;
use PHPUnit\Framework\TestCase;

require_once 'Order.php';
require_once 'Pizza.php';

class OrderTest extends PHPUnit_Framework_TestCase {
  public function testGetTotalPrice() {
    $pizza1 = new Pizza("Margherita", 10);
    $pizza2 = new Pizza("Pepperoni", 12);

    $order = new Order();
    $order->add_pizza($pizza1);
    $order->add_pizza($pizza2);

    $this->assertEquals(22, $order->get_total_price());
  }
}
