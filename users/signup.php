<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
</head>

<body align="center">
    <div style="margin-top: 100px;">


        <form action="signup.php" method="post">

            <input type="text" name="uname" placeholder="Create username">
            <input type="password" name="pwd" placeholder="Create Password">
            <button name="sbtn" type="submit">Sign Up</button>
        </form>

        <a style="text-align: center; margin-top:20px" href="../index.php">Home</a>
    </div>
    <?php


    if (isset($_POST['sbtn'])) {

        include '../db.php';

        $uname = mysqli_real_escape_string($conn, strip_tags($_POST['uname']));
        $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

        $sql = "SELECT * FROM users WHERE user_uname= '$uname'";
        $res = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($res);

        if ($num < 1) {
            $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

            $sql = "INSERT INTO users(user_uname, user_pwd) VALUES('$uname', '$hashedPwd')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                header('location: ../index.php?success');
                exit();
            } else {
                header('location: ../index.php?signup_failed');
                exit();
            }
        } else {
            header('Location: ../index.php?user_exists');
            exit();
        }
    }
    ?>
</body>

</html>
