<?php
namespace App\Tests;

// use App\Order;
// use App\Pizza;
// use PHPUnit\Framework\TestCase;

// require_once 'Order.php';
// require_once 'Pizza.php';

// class OrderTest extends PHPUnit_Framework_TestCase {
//   public function testGetTotalPrice() {
//     $pizza1 = new Pizza("Margherita", 10);
//     $pizza2 = new Pizza("Pepperoni", 12);

//     $order = new Order();
//     $order->add_pizza($pizza1);
//     $order->add_pizza($pizza2);

//     $this->assertEquals(22, $order->get_total_price());
//   }
// }
use PHPUnit\Framework\TestCase;
use App\Pizza;

use App\Order;

use App\Pizza;


class OrderTest extends TestCase {
  public function testGetTotalPrice() {
    $pizza1 = new Pizza('Margarita', 10);
    $pizza2 = new Pizza('Pepperoni', 12);
    $order = new Order([$pizza1, $pizza2], 'John Doe', '123 Main St');
    $this->assertEquals(22, $order->get_total_price());
  }

  public function testSetStatus() {
    $pizza1 = new Pizza('Margarita', 10.99);
    $pizza2 = new Pizza('Pepperoni', 12.99);
    $order = new Order([$pizza1, $pizza2], 'John Doe', '123 Main St');
    $order->set_status('in progress');
    $this->assertEquals('in progress', $order->status);
  }
}
