<?php

session_start();

include '../db.php';


$myid = $_SESSION['u_id'];
$oid = $_SESSION['other_id'];


 $sql =  "SELECT * FROM messages where  sender_id = '$myid' and receiver_id =  '$oid' OR   sender_id = '$oid' and receiver_id = '$myid'  ";



$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_all($result, MYSQLI_ASSOC);
exit(json_encode($row));



