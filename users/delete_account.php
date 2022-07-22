<?php
sesion_start();

if(isset($_SESSION['u_id'])){
	
	$uid = $_SESSION['u_id'];
	require '../db.php';
	$sql = "DELETE FROM users WHERE user_id = '$uid'";
	mysqli_query($conn, $sql);
	header('location: ../index.php');
	exit();

}
