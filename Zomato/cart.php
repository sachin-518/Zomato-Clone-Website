<?php





	require "dbconfig.php";

	session_start();
	$user_id = $_SESSION['user_id'];


?>


<!DOCTYPE html>
<html>
<head>
	<title>Cart</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300&display=swap" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=Orelega+One&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="style.css">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
</head>
<body>
	<nav class="navbar navbar-light" style="background-color: red;">
		<h3 class="navbar-brand text-white ">Zomato</h3>

		<div class="col-md-3" id="login">
				<?php
					if(empty($_SESSION)){
						die('invalid url');

					}else{
						echo '<a href="#"><i class="fas fa-shopping-cart text-white"></i></a>';
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
	<div class="container" style="max-width: 1600px;">

		
		<div class="row">
			<div class="col-md-6" id="cart_left">
				<div class="card3">
					<h2 class="thank">Thank You For Choosing Zomato!!!!</h2>
				</div>
				
			</div>
			<div class="col-md-6">
				<h2 class="mt-4" id="my_cart" style="font-family: 'Cormorant Garamond'; font-weight: bolder; font-size: xxx-large; color: darkgreen;">My Cart</h2>
				<span id="empty_cart" class="mt-1 ml-5 text-center text-danger" style="display: inline-block; font-size: 1.8rem;"></span>
				<div class="card2">
					<div class="card-body">

						<table class="table mt-4 mb-4" style="color: black;">
							<tr style="vertical-align: middle; text-align: center; font-family: serif; font-size: 25px;">
								<th>Item</th>
								<th>Quantity</th>
								<th>Price</th>
							</tr>
							<?php
								$user_id = $_SESSION['user_id'];
								$query = "SELECT * FROM cart c JOIN food f ON c.food_id = f.id WHERE user_id = $user_id";
								$result = mysqli_query($conn,$query);
								$total = 0;
								while($row = mysqli_fetch_assoc($result)){
										$total = $total + $row['price'] * $row['quantity'] ;
										echo '<tr id="item'.$row["id"].'" style="vertical-align: middle; text-align: center;"> 
												<td>
													<h5>'.$row['name'].'</h5>

												</td>
												<td id="quant"><a href="#"><i data-id=' .$row["id"].' class="sub fas fa-minus"></i></a><h5><span id="quantity'.$row["id"].'">'.$row["quantity"].'</span></h5><a href="#" style="text-decoration:none"><i data-id=' .$row["id"].' class="add fas fa-plus"></i></a></td>
												<td><h5>Rs <span id="price'.$row["id"].'">'.$row['price']*$row["quantity"].'</span></h5></td>
											</tr>';
								}

							?>
							



						</table>

					</div>
				</div>

				<h4 id="total">Total Amount: Rs <span id="amount"><?php echo $total; ?></span></h4>
				<a href="place_order.php" id="checkout_btn" class="btn btn-warning btn-lg mt-2" style="float:right; font-weight:bold; margin-right: 50px;">Proceed to Checkout</a>
			</div>
		</div>
	</div>





	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="js/cart.js"></script>
	<script type="text/javascript" src="js/cart_button.js"></script>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>