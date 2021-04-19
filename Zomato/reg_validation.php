<?php




require "dbconfig.php";

if($_SERVER['REQUEST_METHOD'] == 'GET'){
	echo "Invalid URL";
	exit();
}
session_start();

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$password = md5($password);

$query = "INSERT INTO user VALUES (NULL,'$name','$email','$password','Profile-PNG-Icon.png')";


if(mysqli_query($conn, $query)){
	$query2 = "SELECT * FROM user WHERE email LIKE '$email'";
	$result = mysqli_query($conn,$query2);
	$fetched_result = mysqli_fetch_assoc($result);
	$name = $fetched_result['name'];
	$user_id = $fetched_result['user_id'];
	$email = $fetched_result['email'];
	$_SESSION['user_id'] = $user_id;
	$_SESSION['name'] = $name;
	$_SESSION['email'] = $email;
	$query3 = "INSERT INTO user_details (user_id) VALUES ($user_id)";
	mysqli_query($conn, $query3);

	


	header('Location:profile.php');
}else{
	header('Location:index.php?err=2');
}


?>
