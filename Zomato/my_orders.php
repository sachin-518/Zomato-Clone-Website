<?php

	session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>My Orders</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style.css">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Satisfy&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&display=swap" rel="stylesheet">
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

	<div class="container">
		<h3 class="mt-5 mb-5" style="font-family: 'Satisfy', cursive;font-size: 3rem;">My Orders : </h3>

		<div class="individual-orders">
			

				<?php

					require "dbconfig.php";

					$user_id = $_SESSION['user_id'];

					$query = "SELECT * FROM order_track WHERE user_id LIKE $user_id";

					$result = mysqli_query($conn,$query);

					if(mysqli_num_rows($result) == 0){
						echo '<h4 class="text-center mt-5">No items in your order to display!!</h4>';
					}

					while ($row = mysqli_fetch_assoc($result)) {

						echo '<div class="order-row">';

						$temp = $row['order_date'];
						$temp1 = date('d-M-Y', strtotime($temp));

						echo '<p>Order ID : <b>'.$row['id'].'</b></p>
							<p>Order Date : <b>'.$temp1.'</b></p>';

						$order_id = $row['id'];

						$query1 = "SELECT * FROM order_details d INNER JOIN food f ON d.food_id=f.id WHERE order_id='$order_id'";

						$result1 = mysqli_query($conn,$query1);

						echo '<div class="order-items">';

						while ($row1 = mysqli_fetch_assoc($result1)) {
							echo '<div class="card" style="width: 16rem;">
			  							<img class="card-img-top" style="height: 190px;object-fit: cover;" 
			  								src="'.$row1['img'].'">
			  							<div class="card-body">
			    							<h5 class="card-title" id="food-item">'.$row1['name'].'</h5>
			    							<p class="card-text">Quantity: <b>'.$row1['quantity'].'</b></p>
			    							<a href="restaurant.php?id='.$row1['res_id'].'" class="btn btn-primary">Browse..</a>
			  							</div>
								</div>';
						}

						echo '</div>';

						echo '<div class="order-details">';

							echo "<p>Order Total :  <b>Rs. $row[order_total]</b></p>";
							echo "<p>Coupon Applied :  <b>$row[coupon]</b></p>";

							$applied_coupon = $row['coupon'];
							$total_before_disc = $row['order_total'];

							$query2 = "SELECT * FROM coupon WHERE coupon_code='$applied_coupon'";

							$result2 = mysqli_query($conn,$query2);

							$fetched_result = mysqli_fetch_assoc($result2);

							$coupon_type = $fetched_result['coupon_type'];
							$coupon_value = $fetched_result['coupon_value'];
							$total_after_disc = 0;

							if ($coupon_type == 'FLAT OFF') {
								$total_after_disc = $total_before_disc - $coupon_value;
							}else{
								$total_after_disc = $total_before_disc - (($coupon_value/100)*$total_before_disc);
							}

							echo "<p>Total Amount Paid :<b>  Rs. $total_after_disc </b></p>";

							echo '</div>';

						echo '</div>';
	
					}

					

				?>
				
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

	<script type="text/javascript" src="js/app.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>

