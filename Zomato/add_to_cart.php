<?php





	require "dbconfig.php";

	session_start();
	if(!empty($_GET)){
		$food_id = $_GET['food_id'];
		$user_id = $_SESSION['user_id'];
	}else{
		die('invalid url');
	}


	$query = "SELECT * FROM cart WHERE food_id LIKE $food_id AND user_id LIKE $user_id";
	$result = mysqli_query($conn,$query);
	if(mysqli_num_rows($result) > 0){
		echo 'This product already exists in your cart';
		exit();
	}

	$query1 = "INSERT INTO cart VALUES (NULL,$food_id,$user_id,1)";
	if(mysqli_query($conn,$query1)) {
		echo 'Product added to the cart';
	}else{
		echo "Some error occurred!! Please try again.";
	}
?>