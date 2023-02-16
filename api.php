<?php

use App\Order;
use App\Pizza;
use App\Pizzeria;

// Charger les classes Pizza, Order et Pizzeria
require_once('Pizza.php');
require_once('Order.php');
require_once('Pizzeria.php');

// Créer une instance de la pizzeria
$pizzeria = new Pizzeria();

// Définir les en-têtes HTTP
header('Content-Type: application/json');

// Vérifier la méthode HTTP utilisé
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
  case 'GET':
    // Récupérer une commande
    if (isset($_GET['order_number'])) {
      $order_number = $_GET['order_number'];
      $order = $pizzeria->get_order($order_number);
      if ($order) {
        echo json_encode($order);
      } else {
        http_response_code(404);
        echo json_encode(array('message' => 'Commande non trouvée.'));
      }
    }
    // Récupérer toutes les commandes
    else {
      $orders = $pizzeria->get_orders($order_number);
      echo json_encode($orders);
    }
    break;
  case 'POST':
    // Créer une nouvelle commande
    $data = json_decode(file_get_contents('php://input'), true);
    $pizzas = array();
    foreach ($data['pizzas'] as $pizza_data) {
      $type = $pizza_data['type'];
      $ingredients = $pizza_data['ingredients'];
      $size = $pizza_data['size'];
      $pizza = new Pizza($type, $ingredients, $size);
      $pizzas[] = $pizza;
    }
    $customer_name = $data['customer_name'];
    $customer_address = $data['customer_address'];
    $order = new Order($pizzas, $customer_name, $customer_address);
    $pizzeria->add_order($order);
    http_response_code(201);
    echo json_encode(array('message' => 'Commande créée.'));
    break;
  case 'DELETE':
    // Supprimer une commande
    if (isset($_GET['order_number'])) {
      $order_number = $_GET['order_number'];
      $order = $pizzeria->get_order($order_number);
      if ($order) {
        $pizzeria->delete_order($order_number);
        http_response_code(200);
        echo json_encode(array('message' => 'Commande supprimée.'));
      } else {
        http_response_code(404);
        echo json_encode(array('message' => 'Commande non trouvée.'));
      }
    } else {
      http_response_code(400);
      echo json_encode(array('message' => 'Numéro de commande manquant.'));
    }
    break;
  default:
    http_response_code(405);
    echo json_encode(array('message' => 'Méthode non autorisée.'));
    break;
}
