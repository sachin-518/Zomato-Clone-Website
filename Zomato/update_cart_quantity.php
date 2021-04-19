<?php 


require "dbconfig.php";
session_start();



$user_id = $_SESSION['user_id'];


$food_id = $_GET['food_id'];
$quantity = $_GET['quantity'];
$query = "UPDATE cart SET quantity=$quantity WHERE food_id = $food_id AND user_id=$user_id";
mysqli_query($conn,$query);





?>