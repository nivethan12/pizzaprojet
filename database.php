<?php
// $servername = "localhost";
// $username = "username";
// $password = "password";

// // Créer la connexion
// $conn = mysqli_connect($servername, $username, $password);

// // Vérifier la connexion
// if (!$conn) {
//     die("La connexion a échoué : " . mysqli_connect_error());
// }
// echo "Connexion réussie";

// // Créer la base de données
// $sql = "CREATE DATABASE pizzeria";
// if (mysqli_query($conn, $sql)) {
//     echo "Base de données créée avec succès";
// } else {
//     echo "Erreur lors de la création de la base de données : " . mysqli_error($conn);
// }

// mysqli_close($conn);


$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "pizzeria";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE DATABASE pizzeria;

USE pizzeria;

CREATE TABLE pizzas (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  price DECIMAL(10,2) NOT NULL
);

CREATE TABLE orders (
  id INT AUTO_INCREMENT PRIMARY KEY,
  customer_name VARCHAR(255) NOT NULL,
  order_date DATETIME NOT NULL,
  total_price DECIMAL(10,2) NOT NULL
);

CREATE TABLE order_pizzas (
  order_id INT NOT NULL,
  pizza_id INT NOT NULL,
  FOREIGN KEY (order_id) REFERENCES orders(id),
  FOREIGN KEY (pizza_id) REFERENCES pizzas(id)
);";

if ($conn->multi_query($sql) === TRUE) {
    echo "Tables created successfully";
} else {
    echo "Error creating tables: " . $conn->error;
}


//création des fixtures//
$pizzas = array(
    array("name" => "Margherita", "price" => 10.99),
    array("name" => "Pepperoni", "price" => 12.99),
    array("name" => "4 Cheese", "price" => 11.99),
    array("name" => "Queen", "price" => 13.99)
  );
  
  // Boucle pour insérer les fixtures dans la table pizzas
  foreach ($pizzas as $pizza) {
    $sql = "INSERT INTO pizzas (name, price) VALUES ('" . $pizza["name"] . "', '" . $pizza["price"] . "')";
  
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }
  
  $conn->close();

// INSERT INTO pizzas (name, price) VALUES
//   ('Margherita', 10.99),
//   ('Pepperoni', 12.99),
//   ('4 Cheese', 11.99),
//   ('Queen', 13.99);

// INSERT INTO orders (customer_name, order_date, total_price) VALUES
//   ('Peter Parker', '2023-07-01 12:00:00', 22.98),
//   ('Harry Potter', '2023-07-02 13:00:00', 35.97);

// INSERT INTO order_pizzas (order_id, pizza_id) VALUES
//   (1, 1),
//   (1, 2),
//   (2, 3),
//   (2, 2),
//   (2, 1);



