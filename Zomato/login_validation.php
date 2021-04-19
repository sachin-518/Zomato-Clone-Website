<?php

require "dbconfig.php";



if($_SERVER['REQUEST_METHOD'] == 'GET'){
	echo "Invalid URL";
	exit();
}


session_start();



$email = $_POST['email'];
$password = $_POST['password'];
$password = md5($password);



$query = "SELECT * FROM user WHERE email LIKE '$email' AND password LIKE '$password'";

$result = mysqli_query($conn,$query);
$fetched_result = mysqli_fetch_assoc($result);
$num_rows = mysqli_num_rows($result);



if($num_rows == 1){
	$name = $fetched_result['name'];
	$user_id = $fetched_result['user_id'];
	$email = $fetched_result['email'];
	$_SESSION['user_id'] = $user_id;
	$_SESSION['name'] = $name;
	$_SESSION['email'] = $email;


	header('Location:index.php');
}else{
	header('Location:index.php?err=1');


}

?>