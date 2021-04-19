<?php

	session_start();
	if(!empty($_GET)){
		$order_id = $_GET['order_id'];
	}else{
		die('Invalid URL');
	}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Order placed</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style.css">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

	<script src="https://kit.fontawesome.com/12fd2f4021.js" crossorigin="anonymous"></script>

</head>
<body>

	<nav class="navbar navbar-light" style="background-color: red;">
		<h3 class="navbar-brand text-white ">Zomato</h3>

		<div class="col-md-3" id="login">
				<?php
					if(empty($_SESSION)){
						echo '<button class="btn-1" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>';

					}else{
						echo '<a href="cart.php"><i class="fas fa-shopping-cart text-white"></i></a>';
						echo 
						'<div class="dropdown">
							  <button class="dropbtn" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">Hi,'.
							    strtok($_SESSION['name'], " ").'
							  </button>
							  <ul class="dropdown-content" aria-labelledby="dropdownMenuButton1">
							  	<li><a class="dropdown-item" href="index.php">Home</a></li>
							    <li><a class="dropdown-item" href="profile.php">My Profile</a></li>
							    <li><a class="dropdown-item" href="#">Settings</a></li>
							    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
							  </ul>
						</div>';
					}



				?>
				</div>
			</div>

	</nav>

	<div class="order-confirmation-page">
		<div class="order-confirmed">
			<i class="order-pace-icon text-danger far fa-check-circle"></i>
			<h5>
				<i style="font-family: 'Dancing Script', cursive;font-size: 2.7rem;">Hey, <?php echo $_SESSION['name']?></i>
			</h5>
			<h3 class="text-center" style="font-family: 'Cookie', cursive;font-size: 6.4rem; color: brown;">
				Your Order is Confirmed !!
			</h3>
			<i class="order-pace-icon text-danger fas fa-gift"></i>
			<p>
				<i style="margin-bottom: 30px;"><h5 style="color: green; font-size: 20px;">We will send you a mail as soon as your order is picked up...</h5></i>
			</p>
			<a href="my_orders.php" class="btn btn-lg btn-danger">My Orders</a>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

	<script type="text/javascript" src="js/app.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>


