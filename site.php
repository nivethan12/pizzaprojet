<!DOCTYPE html>
<html>
<head>
	<title>Ma Pizzeria</title>
	<link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
</head>
<body>

	<div class="container">
		<h1>La Pizz's</h1>
		<p>Bienvenue sur notre site de commande en ligne !</p>

		<div class="row">
			<div class="col-md-8">
				<h2>Nos pizzas</h2>

				<div class="card mb-3">
					<div class="row g-0">
						<div class="col-md-4">
							<img src="https://via.placeholder.com/300x200" alt="Pizza Margherita">
						</div>
						<div class="col-md-8">
							<div class="card-body">
								<h5 class="card-title">Pizza Margherita</h5>
								<p class="card-text">Une pizza classique avec de la mozzarella, de la tomate et du basilic.</p>
								<p class="card-text"><strong>Prix : 10 €</strong></p>
								<button type="button" class="btn btn-primary btn-order" data-pizza="margherita">Commander</button>
							</div>
						</div>
					</div>
				</div>

				<div class="card mb-3">
					<div class="row g-0">
						<div class="col-md-4">
							<img src="https://via.placeholder.com/300x200" alt="Pizza Queen">
						</div>
						<div class="col-md-8">
							<div class="card-body">
								<h5 class="card-title">Pizza Queen</h5>
								<p class="card-text">Une pizza avec du jambon, champignon et de la mozzarella.</p>
								<p class="card-text"><strong>Prix : 12 €</strong></p>
								<button type="button" class="btn btn-primary btn-order" data-pizza="queen">Commander</button>
							</div>
						</div>
					</div>
				</div>

			</div>

			<div class="col-md-4">
				<h2>Votre commande</h2>

				<ul class="list-group" id="order-list">
				</ul>

				<div class="text-center mt-3">
					<button type="button" class="btn btn-success" id="btn-validate-order">Valider la commande</button>
				</div>
			</div>
		</div>
	</div>

	<script src="./node_modules/jquery/dist/jquery.min.js"></script>
	<script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

	<script>
		class Pizza {
			constructor(name, price) {
				this.name = name;
				this.price = price;
			}
		}

		class Pizzeria {
			constructor() {
				this.menu = [
					new Pizza('Margherita', 10),
					new Pizza('Queen', 12),
					new Pizza('Pepperoni', 13),
					new Pizza('4 cheese', 14)
				];

				this.order = [];
                this.totalPrice = 0;

                this.updateOrderList = () => {
                 const $orderList = $('#order-list');
                  $orderList.empty();

                  this.order.forEach(pizza => {
                   const $item = $('<li>').addClass('list-group-item').text(`${pizza.name} - ${pizza.price} €`);
                   $orderList.append($item);
                 });

                 const $totalPrice = $('<li>').addClass('list-group-item active').text(`Prix total : ${this.totalPrice} €`);
                 $orderList.append($totalPrice);
               }

                this.addToOrder = (name, price) => {
                  const pizza = new Pizza(name, price);
                  this.order.push(pizza);
                  this.totalPrice += pizza.price;
                 this.updateOrderList();
               }

               this.validateOrder = () => {
      alert('Commande validée !');
      this.order = [];
      this.totalPrice = 0;
      this.updateOrderList();
    }
  }
}

$(document).ready(() => {
  const pizzeria = new Pizzeria();

  $('.btn-order').click(function() {
    const pizzaName = $(this).data('pizza');
    const pizza = pizzeria.menu.find(pizza => pizza.name.toLowerCase() === pizzaName);
    pizzeria.addToOrder(pizza.name, pizza.price);
  });

  $('#btn-validate-order').click(() => {
    pizzeria.validateOrder();
  });
});


