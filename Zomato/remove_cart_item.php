<?php 


require "dbconfig.php";
session_start();



$user_id = $_SESSION['user_id'];


$food_id = $_GET['food_id'];
$query = "DELETE FROM cart WHERE food_id = $food_id AND user_id=$user_id";
mysqli_query($conn,$query);





?>