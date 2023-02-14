<?php
namespace App;

use App\Order;
use App\Pizza;

require_once 'Pizzeria.php';
require_once 'Order.php';
require_once 'Pizza.php';


class PizzeriaTest extends PHPUnit_Framework_TestCase {
  public function testPlaceOrder() {
    $pizzeria = new Pizzeria();

    $pizza1 = new Pizza("Margherita", 10);
    $pizza2 = new Pizza("Pepperoni", 12);

    $order = new Order();
    $order->add_pizza($pizza1);
    $order->add_pizza($pizza2);

    $order_id = $pizzeria->place_order($order);

    $this->assertEquals(1, $order_id);
    $this->assertEquals($order, $pizzeria->get_order($order_id));
  }
}

