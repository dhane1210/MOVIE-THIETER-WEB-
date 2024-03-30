<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Reg</title>
    <link href="reg1.css" rel="stylesheet">
</head>
<body>

<?php include 'nav2.php' ?>

<?php
session_start();
if (isset($_SESSION["user"])){
    header("Location: HomePage1.php");
}
?>

    <div class="container">
        <?php
        if(isset($_POST["submit"])) {
            $fullname = $_POST["fullname"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $passwordRepeat  = $_POST["repeat_password"];
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            $errors = array();
            if(empty($fullname) || empty($email) OR empty($password) OR empty($passwordRepeat)) {
                array_push($errors,"ALL Fields are required");
            }
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                array_push($errors,"Email is not valid");
            }
            if(strlen($password) < 8) {
                array_push($errors,"Password must be least 8 cha long");
            }
            if($password!==$passwordRepeat){
                array_push($errors,"Password does not match");
            }
            require_once("database.php");
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $rowCount = mysqli_num_rows($result);
            if($rowCount > 0){
                array_push($errors,"Email already exits!");
            }
            if (count($errors) > 0) {
                foreach($errors as $error) {
                    echo"<div class='alert alert-danger'>$error<>";
                }
            }else{
                
                $sql = "INSERT INTO users (full_name, email, password) VALUES ( ?, ?, ?)";
                $stmt = mysqli_stmt_init( $conn );
                mysqli_stmt_prepare($stmt,$sql);
                if ($stmt){
                    mysqli_stmt_bind_param($stmt,"sss", $fullname,$email,$passwordHash);
                    mysqli_stmt_execute($stmt);
                    echo"<div class='alert alert-success'>You are registered successfully.</div>";
                    
                }else{
                    die("Something went wrong");
                }
            }    
        }
        ?>

<form action="registration1.php" method="post">
<div class="h4 pb-2 mb-4 text-white border-bottom border-white"
        style="font-size: 30px; margin-left: -20px; margin-top: 3%; font-weight: bold; font-family: Verdana, Geneva, Tahoma, sans-serif; padding-left: auto;">
        REGISTRATION
    </div><br><br>
    <div class="form-group">
        <input type="text" class="form-control" name="fullname" placeholder="Full Name">
    </div>
    <div class="form-group">
        <input type="email" class="form-control" name="email" placeholder="Email">
    </div>
    <div class="form-group">
        <input type="password" class="form-control" name="password" placeholder="Password">
    </div>
    <div class="form-group">
        <input type="password" class="form-control" name="repeat_password" placeholder="Repeat Password">
    </div>
    <div class="form-btn">
        <input type="submit" value="REGISTER" name="submit" class="btn custom-login-btn">
    </div>

    
</form><br><br>
<div class="register-text">
    <p style="color: white;">Already Registered ? : <a href="Login1.php">LOGIN</a></p>
</div>

    </div> 

    </body>
    </html>
