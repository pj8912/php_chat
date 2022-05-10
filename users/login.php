<?php
session_start();
?>

<?php

include  '../db.php';

if (isset($_POST['lbtn'])) {


    $uname = mysqli_real_escape_string($conn, $_POST['uname']);
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);


    $sql = "SELECT * FROM users WHERE user_uname = '$uname'";
    $res = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($res);

    if ($num > 0) {

        while ($row = mysqli_fetch_assoc($res)) {
            $hashedPwd = $row['user_pwd'];

            $checkPwd = password_verify($pwd, $hashedPwd);

            if ($checkPwd == false) {
                header('Location: ../index.php?login_err');
                exit();
            } else {

                $_SESSION['u_id']  = $row['user_id'];
                $_SESSION['u_uname']  = $row['user_uname'];

                header('location: ../chat/users.php');
                exit();
            }
        }
    } else {
        header('Location: ../index.php?login_err');
        exit();
    }
} else {
    header('Location: ../index.php');
    exit();
}

