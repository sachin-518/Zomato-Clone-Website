<?php





require "dbconfig.php";

session_start();
if(!empty($_GET)){
	$cus_id = $_GET['id'];
}else{
	die('invalid url');
}
$query = "SELECT * FROM cusines WHERE id =$cus_id";
$result = mysqli_query($conn,$query);
$fetched_result = mysqli_fetch_assoc($result);
$cus_name = $fetched_result['name'];

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>cusine- <?php echo $cus_name ?></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	<link rel="stylesheet" href="style.css">
	
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Dela+Gothic+One&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
	<style>
	body  {
  		background-image: url("");
  		background-size: cover;
	}
	a:hover{
            display: block;
            border: 1px solid black;
            box-shadow: 0 8px 16px 0 rgba(0,0,2,10);
        }
</style>
</head>
<body>
	<nav class="navbar navbar-light" style="background-color: red;">
		<h3 class="navbar-brand text-white ">Zomato</h3>

		<div class="col-md-3" id="login">
				<?php
					if(empty($_SESSION)){
						die('invalid url');

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



	<div class="container" id="cus_container">
		<div class="row4 d-flex">
			<div class="col-md-3" id="menu"><h2 id="cusine-name"><?php echo $cus_name ?></h2></div>
		</div>
		<div class="row5 d-flex justify-content-between">
		<div class="col-md-3 m-2 p-2"></div>
		<div class="col-md-3 m-2 p-2"><b>Item</b></div>
		<div class="col-md-1 m-2 p-2"><b>Price</b></div>
		<div class="col-md-5 m-2 p-2"><b>Restaurant</b></div>
	</div>

		
	<?php
	$query = "SELECT * FROM food WHERE cus_id =$cus_id";
	$result = mysqli_query($conn,$query);
	$query2 = "SELECT * FROM restaurant WHERE cus_id =$cus_id";
	while($row = mysqli_fetch_assoc($result)){
		$res_id = $row['res_id'];
		$query2 = "SELECT * FROM restaurant WHERE id = $res_id";
		$result2 = mysqli_query($conn,$query2);
		$fetched_result = mysqli_fetch_assoc($result2);
		echo '<a href="restaurant.php?id='.$fetched_result['id'].'"><div class="row4 mb-5 d-flex justify-content-between">
		<div class="col-md-3 m-2 p-2">
			<img src="'.$row['img'].'" class="food-img img-fluid" alt="Food image"></div>
		<div class="col-md-3 m-2 p-2">
			<h2 id="food-name">'.$row['name'].'</h2></div>
		<div class="col-md-1 m-2 p-2 mt-5" id="food-name">'.$row['price'].'</div>
		<div class="col-md-5 m-2 p-2 mt-5" id="food-name">'.$fetched_result['name'].'</div>

		</div></a>';

	}


	?>
</div>




	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="js/app.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

</body>
</html>