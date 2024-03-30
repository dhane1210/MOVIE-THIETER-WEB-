<?php
session_start();
include 'database.php'; // Include database connection
$conn = getConnection();

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Fetch admin from database with provided username
    $sql = "SELECT * FROM admins WHERE username = ? LIMIT 1";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result && mysqli_num_rows($result) > 0) {
        $admin = mysqli_fetch_assoc($result);
        // Verify password
        if ($password === $admin['password']) {
            // Password is correct, redirect to admin panel
            $_SESSION['admin'] = $admin['username'];
            header("Location: admin1.php");
            exit();
        } else {
            // Password is incorrect
            $error = "Invalid username or password.";
        }
    } else {
        // Admin not found
        $error = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <?php include("nav2.php");?>
    <style>
        body {
            color: white;
            font-family: Arial, sans-serif;
            background-color: rgb(33, 33, 45);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            color: white;
            background-color: rgb(29, 29, 46);
            border-radius: 20px;
            box-shadow: 0 0 10px rgba(177, 16, 16, 0.974);
            padding: 20px;
            width: 300px;
            height: auto;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: white;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }

        .error {
            color: red;
            text-align: center;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    
    <div class="container">
        <h2>ADMIN LOGIN</h2>
        <?php if (isset($error))
            echo "<p class='error'>$error</p>"; ?>
        <form action="adminlogin.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit" name="login">Login</button>
        </form>
    </div>
</body>

</html>