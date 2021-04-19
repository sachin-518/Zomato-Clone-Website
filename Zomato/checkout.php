<?php

	session_start();

	require "dbconfig.php";

	// get the order id from the previous page
	if(!empty($_GET)){
		$order_id = $_GET['order_id'];
	}else{
		die('Invalid URL');
	}
	

	$user_id = $_SESSION['user_id'];

	//$cart_value_at_checkout = $_GET['cart_total'];

	$cart_value_at_checkout = 0;

	$query = "SELECT * FROM cart c INNER JOIN food f ON c.food_id = f.id WHERE user_id = $user_id";

	$result = mysqli_query($conn,$query);

	while ($row = mysqli_fetch_assoc($result)) {
		$cart_value_at_checkout += $row['quantity'] * $row['price'] ;
	}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Checkout Page</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style.css">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Acme&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@200&display=swap" rel="stylesheet">

	<script src="https://kit.fontawesome.com/12fd2f4021.js" crossorigin="anonymous"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

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

	<div class="checkout-page">

		<div class="checkout-page-left">
			<div class="apply-coupon">
				<h3 style="color: black;">Cart Subtotal : Rs. <span id="total_before_disc"><?php echo $cart_value_at_checkout; ?></span></h3>

				<p><i>Select a coupon to avail the discount...</i><i class="fas fa-tags"></i></p>

				<form id="discount-form">

					<label style="font-family: 'Courgette', cursive;font-size: 1.6rem;" for="coupon">Choose a coupon:</label>
					<select name="coupon" id="coupon">
						<option value="NONE">NONE</option>
					    <option value="EAT50">EAT50</option>
					    <option value="PER15">PER15</option>
					    <option value="ZOMATO150">ZOMATO150</option>
					    <option value="GET25">GET25</option>
					</select>
					<br><br>
				</form>

				<button type="button" id="discount-btn">APPLY</button>
				<h4 id="applied_disc"></h4>

			</div>
		</div>

		<div class="checkout-page-right">
			<div class="select-coupon">

				<?php

					require "dbconfig.php";

					$query = "SELECT * FROM coupon";

					$result = mysqli_query($conn,$query);

					while ($row = mysqli_fetch_assoc($result)) {
						if ($row['coupon_type'] == 'FLAT OFF') {
							echo '<div class="coupon-details">
									<h4>'.$row['coupon_code'].'</h4>
									<div class="details">
										<h3 class="text-primary">'.$row['coupon_type'].'</h3>
										<h2>Rs. '.$row['coupon_value'].'  ( <span class="text-secondary" id="min-cart-val">Minimum Cart Value : Rs. '.$row['cart_min_value'].'</span> )</h2>
									</div>
							</div>';
						}else{
							echo '<div class="coupon-details">
									<h4>'.$row['coupon_code'].'</h4>
									<div class="details">
										<h3 class="text-primary">'.$row['coupon_type'].'</h3>
										<h2>'.$row['coupon_value'].' %  ( <span class="text-secondary" id="min-cart-val">Minimum Cart Value : Rs. '.$row['cart_min_value'].'</span> )</h2>
									</div>
							</div>';
						}
						
					}

				?>
				
			</div>

			<!-- so that we can retrieve the value of order id on the next page -->
			<input type="hidden" name="order_id" value="<?php echo $order_id; ?>" id="order_id">

			<a href="select_address.php?order_id=<?php echo $order_id; ?>" class="btn btn-secondary btn-lg" style="float: right;margin-top: 25px;margin-right: 65px;" id="go-to-address-page">Proceed</a>
		</div>

	</div>


	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

	<script type="text/javascript" src="js/coupon.js"></script>
	<script type="text/javascript" src="js/final_coupon.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>


