<?php session_start(); ?>

<?php

include '../db.php';

$postdata = file_get_contents("php://input"); //get input file contents

$req = json_decode($postdata); // decode the contents

//two values : 1.message, 2.other id

$message = $req->message;
$oid=  $req->other_id;
$myid = $_SESSION['u_id'];
$oname = $_SESSION['oname'];

$sql = "INSERT INTO messages(message, sender_id, receiver_id, receiver_name) VALUES('$message', '$myid', '$oid', '$oname')";
mysqli_query($conn, $sql);

