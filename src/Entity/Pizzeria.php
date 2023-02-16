<?php

namespace App;
class Pizzeria {
  public $orders;

  public function __construct() {
    $this->orders = array();
  }

  public function add_order(Order $order) {
    $this->orders[] = $order;
  }

  public function get_order($order_number) {
    foreach ($this->orders as $order) {
      if ($order->order_number === $order_number) {
        return $order;
      }
    }
    return null;
  }

  public function get_total_sales() {
    $total_sales = 0;
    foreach ($this->orders as $order) {
      $total_sales += $order->get_total_price();
    }
    return $total_sales;
  }
}
