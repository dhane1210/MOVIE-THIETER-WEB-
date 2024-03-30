<?php

session_start();
if (isset($_SESSION["user"])) {
    header("Location: HomePage1.php");
    exit(); // Exit to prevent further execution
}
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>LOGIN</title>
    <link href="Logincs2.css" rel="stylesheet">

</head>

<body>
    <?php include 'nav2.php' ?>
    <div class="container">

        <?php
        if (isset($_POST["login"])) {
            $email = $_POST["email"];
            $password = $_POST["password"];
            require_once "database.php";
            $sql = "SELECT id, password FROM users WHERE email = ?";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $user_id, $hashed_password);
            mysqli_stmt_fetch($stmt);
            mysqli_stmt_close($stmt);
        
            if ($user_id && password_verify($password, $hashed_password)) {
                $_SESSION["user"] = $user_id;
                header("Location: HomePage1.php");
                exit(); // Exit to prevent further execution
            } else {
                echo "<div class='alert alert-danger'>Invalid email or password</div>";
            }
        }
        ?>
        <form action="Login1.php" method="post">
        <div class="h4 pb-2 mb-4 text-white border-bottom border-white"
        style="font-size: 30px; margin-left: -20px; margin-top: 3%; font-weight: bold; font-family: Verdana, Geneva, Tahoma, sans-serif; padding-left: auto;">
        USER LOGIN
    </div><br><br>
            <div class="form-group">
                <input type="email" placeholder="enter email" name="email" class="form-control">
            </div>
            <div class="form-group">
                <input type="password" placeholder="Enter Password" name="password" class="form-control">
            </div>
            <div class="form-btn">
                <input type="submit" value="LOGIN" name="login" class="btn custom-login-btn">
            </div>
        </form><br><br>
        <div class="register-text">
            <p>NOT REGISTERED YET : <a href="registration1.php">Register Here</a></p>
        </div>
    </div>

</body>

</html>