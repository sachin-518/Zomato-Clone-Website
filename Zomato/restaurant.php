<?php





require "dbconfig.php";

session_start();
if(!empty($_GET)){
	$res_id = $_GET['id'];
}else{
	die('invalid url');
}

$query = "SELECT * FROM restaurant WHERE id =$res_id";

$result = mysqli_query($conn,$query);
$fetched_result = mysqli_fetch_assoc($result);
$res_name = $fetched_result['name'];
$res_img = $fetched_result['image'];
$res_rating = $fetched_result['rating'];
$res_address = $fetched_result['address'];


?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>restaurant- <?php echo $res_name; ?></title>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	
	<link rel="stylesheet" href="style.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Cedarville+Cursive&display=swap" rel="stylesheet">

	<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
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
	<?php
	echo '<div class="container">
			<div class="row3 mt-5">
				<div class="col-md-6" id="pic">
					<img src="'.$res_img.'" id="res-img" alt="Restaurant image"></div>
				
				<div class="col-md-6" id="name" >
					<h2 class="res_name" id="restaurant">'.$res_name.'</h1>
					<p class="res_name" id="address">'.$res_address.'</p>
					<h4 class="res_name col-md-1" id="rating">'.$res_rating.'&#9733</h4></div>
				
				
			</div>
		</div>';
	

	?>
	<div class="container">
		<div class="row4 d-flex">
			<div class="col-md-3" id="menu"><h2>MENU</h2></div>
		</div>
		<div class="row5 d-flex justify-content-between">
		<div class="col-md-3 m-2 p-2"></div>
		<div class="col-md-3 m-2 p-2"><b>Item</b></div>
		<div class="col-md-3 m-2 p-2"><b>Price</b></div>
		<div class="col-md-3 m-2 p-2"><b></b></div>
	</div>

		
	<?php
	$query2 = "SELECT * FROM food WHERE id IN(
SELECT id FROM food
WHERE res_id=$res_id)";
	$result = mysqli_query($conn,$query2);
	while($row = mysqli_fetch_assoc($result)){
		echo '<div class="row4 mb-5 d-flex justify-content-between">
		<div class="col-md-3 m-2 p-2">
			<img src="'.$row['img'].'" class="food-img" alt="Food image"></div>
		<div class="col-md-3 m-2 p-2">
			<h2 id="food-name">'.$row['name'].'</h2>
		'.$row['description'].'</div>
		<div class="col-md-1 m-2 p-2 mt-5"><b>Rs '.$row['price'].'</b></div>
		<div class="col-md-5 m-2 p-2 mt-5 justify-content-center"><button data-id='.$row['id'].' id="add_to_cart" class="cart btn btn-primary btn-rounded">Add To Cart</button></div>

		</div>';

	}


	?>
</div>








	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="js/add_to_cart.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>


</body>
</html>