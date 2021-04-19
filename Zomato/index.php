<?php




require "dbconfig.php";

session_start();



if(!empty($_GET)){
	$err = $_GET['err'];
}else{
	$err = 0;
}


?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Zomato</title>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Orelega+One&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Noto+Serif:ital@1&display=swap" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	<link rel="stylesheet" href="style.css">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />

</head>
<script type="text/javascript">
	$(document).ready(function(){

		var err = '<?php echo $err; ?>';
		if(err === '1'){
			$('#login_error').text('Incorrect Email/Password');
			$('#loginModal').modal('show');

		}else if(err === '2'){
			$('#reg_error').text('Some error occured');
			$('#registerModal').modal('show');
		}
	})
</script>

<body>
	<div class="container-fluid">
		<div class="row justify-content-end">
			<div class="col-md-3" id="login">
				<?php
					if(empty($_SESSION)){
						echo '<button class="btn-1" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>';

					}else{
						echo 
						'<div class="dropdown">
							  <button class="btn-1" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">Hi,'.
							    strtok($_SESSION['name'], " ").'
							  </button>
							  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
							    <li><a class="dropdown-item" href="profile.php">My Profile</a></li>
							    <li><a class="dropdown-item" href="#">Settings</a></li>
							    <li><a class="dropdown-item" href="my_orders.php">My Orders</a></li>
							    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
							  </ul>
						</div>';
					}



				?>




				
			</div>
		</div>
		<div class="row justify-content-center align-items-center" id="tag">
			<div class="col-md-8">
				<h1 class="zomato-text"><b>zomato</b></h1>
				<h3 class="zomato-text">Discover the best food & drinks in Kolkata</h3>

			</div>
		</div>
	</div>



	<div class="container" id="rest">
		<h2 class="mt-5" style="font-family: 'Noto Serif', serif; font-weight: bold;">Order From Top Restaurants</h2>
		<div class="row mt-5">
			
	


		<?php
		$query = "SELECT * FROM restaurant";


		$result = mysqli_query($conn,$query);

		while($row = mysqli_fetch_assoc($result)){

			echo '<div class="col-md-2 d-flex pb-3">
				<a href="restaurant.php?id='.$row['id'].'">


					<div class="card p-2">
						<img src="'.$row['image'].'" class="card-img-top img-fluid" alt="Card image">
						<div class="card-body">
							<div class="card-title"><b>'.$row['name'].'</b></div>
							<div class="card-text"><b>'.$row['rating'].'</b></div>
							<div class="card-text2">'.$row['rate'].' per person</div>


						</div>
					</div>
				</a>
			</div>';

		}

		?>
			</div>

		
	</div>
	<div class="container" id="cus">
		<h2 class="mt-5" id="cus_head" style="font-family: 'Noto Serif', serif; font-weight: bold;">Order By Cusines</h2>
		<div class="row mt-5">
			
	


		<?php
		$query = "SELECT * FROM cusines";


		$result = mysqli_query($conn,$query);

		while($row = mysqli_fetch_assoc($result)){

			echo '<div class="col-md-2 d-flex pb-3">
				<a href="cusines.php?id='.$row['id'].'">


					<div class="card p-2" id="cusines">
						<img src="'.$row['img'].'" class="card-img-top img-fluid" alt="Card image" id="cusines-img">
						<div class="card-body">
							<div class="card-title" id="cusines-title"><b>'.$row['name'].'</b></div>


						</div>
					</div>
				</a>
			</div>';

		}

		?>
			</div>

		
	</div>


	<div class="footer-section">
		<div class="footer-section-left">
			<div class="address">
				<i class="fas fa-map-marker-alt"></i>
				<div class="address-details">
					<h5>Ist Floor R.no 4 Goverdhan Niketan, 134/140 Cavel Cross Lane No 7, Kalbadevi</h5>
					<h4 style="font-family: 'Orelega One', cursive;">Mumbai, Maharashtra</h4>
					<h4 style="font-family: 'Orelega One', cursive;">India</h4>

				</div>
			</div>
			<div class="contact-us">
				<i class="fas fa-headphones"></i>
				<h5>+1800 444 888</h5>
			</div>
			<div class="mail-us">
				<i class="fas fa-envelope"></i>
				<h5>support@zomato.com</h5>
			</div>
		</div>
		<div class="footer-section-right">
			<h1 style="font-family: 'Acme', sans-serif;font-size: 55px; color: red;font-weight: bolder;"><i>Zomato</i></h1>
			<div class="social-links">
				<i class="fab fa-facebook-square" style="color: blue;"></i>
				<i class="fab fa-twitter-square" style="color: skyblue;"></i>
				<i class="fab fa-google-plus-square" style="color: red;"></i>
				<i class="fab fa-linkedin" style="color: blue;"></i>
			</div>
			<div class="app">
				<i class="fab fa-google-play" style="color: red;"></i>
				<h5 >Get the app</h5>
			</div>
		</div>

	</div>

	<p style="text-align: center;" class="text-secondery">&copy; All rights reserved.</p>


	
	<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  		<div class="modal-dialog modal-sm" role="document">
    		<div class="modal-content">
      		<div class="modal-header">
        		<h5 class="modal-title" id="exampleModalLabel">Login</h5>
        		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      		</div>
      		<div class="modal-body" align="justify-content-center">
      			<p id="login_error" class="text-danger"></p>
        		<form class="form" action="login_validation.php" method="POST">
        			<label>Email</label><br>
        			<input type="email" name="email" class="form-control"><br>
        			<label>Password</label><br>
        			<input type="password" name="password" class="form-control"><br>
        			<div class="d-grid gap-2"><input type="submit" name="" value="Login" class="btn btn-warning" align="align-items-center"></div>
        		</form>
        		<p>
        			Not a member yet?<br>
        			<div class="text-center" align="align-items-center"><button id="reg_btn" class="btn btn-sm btn-primary">Sign Up</button></div>
        		</p>


      		</div>
    		</div>
  		</div>
	</div>


	<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  		<div class="modal-dialog modal-sm" role="document">
    		<div class="modal-content">
      		<div class="modal-header">
        		<h5 class="modal-title" id="exampleModalLabel">Sign Up</h5>
        		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      		</div>
      		<div class="modal-body" align="justify-content-center">
      			<p id="reg_error" class="text-danger"></p>
        		<form class="form" action="reg_validation.php" method="POST">
        			<label>Name</label><br>
        			<input type="text" name="name" class="form-control">
        			<label>Email</label><br>
        			<input type="email" name="email" class="form-control">
        			<label>Password</label><br>
        			<input type="password" name="password" class="form-control"><br>
        			<div class="d-grid gap-2"><input type="submit" name="" value="Sign Up" class="btn btn-primary" align="align-items-center"></div>
        		</form>
        		<p>
        			Already a member?<br>
        			<div class="text-center" align="align-items-center"><div class="d-grid gap-2"><button class="btn btn-sm btn-warning" id="login_btn">Login</button></div></div>
        		</p>


      		</div>
    		</div>
  		</div>
	</div>



	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="js/app.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
	</body>
</html>