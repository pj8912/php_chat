<?php session_start(); ?>

<?php
if(isset($_SESSION['u_id'])) {
    header('Location: chat/users.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div style=" margin-top:100px; " align="center">
        <form action="users/login.php" method="post">

            <input type="text" name="uname">
            <input type="password" name="pwd">
            <button type="submit" name="lbtn"> login</button>
        </form>
        <p style="text-align:center">Don't have an account? <a href="users/signup.php">Sign Up</a></p>
    </div>
</body>

</html>