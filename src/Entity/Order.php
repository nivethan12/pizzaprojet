<?php

namespace App;
class Order {
  public $pizzas;
  public $customer_name;
  public $customer_address;
  public $order_number;
  public $status;

  public function __construct($pizzas, $customer_name, $customer_address) {
    $this->pizzas = $pizzas;
    $this->customer_name = $customer_name;
    $this->customer_address = $customer_address;
    $this->order_number = uniqid();
    $this->status = 'pending';
  }

  public function add_pizza(Pizza $pizza) {
    $this->pizzas[] = $pizza;
  }

  public function get_total_price() {
    $total_price = 0;
    foreach ($this->pizzas as $pizza) {
      $total_price += $pizza->get_price();
    }
    return $total_price;
  }

  public function set_status($status) {
    $this->status = $status;
  }
}
