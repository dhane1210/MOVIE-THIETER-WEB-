<?php

session_start();

// Check if the user is logged in
if (isset($_SESSION["user"])) {
    $userLoggedIn = true;
} else {
    $userLoggedIn = false;
}
?>

<?php
if ($userLoggedIn) {
    include("navbarloggedin.php");
} else {
    include("nav2.php");
}
?>
<?php
// Assuming you have established a database connection
include 'database.php';
$conn = getConnection();


if (isset($_POST["submit_feedback"])) {
    $user_id = $_SESSION['user'];
    $feedback_text = $_POST["feedback_text"];
    
    // Insert into user_feedbacks table
    $sql = "INSERT INTO user_feedbacks (user_id, feedback_text) VALUES (?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "is", $user_id, $feedback_text);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    
    // You can also perform additional actions like updating the user table if needed
    
    // Close the database connection
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Feedback</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: rgb(33, 33, 45);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        
        .feedback-container {
            background-color: rgb(29, 29, 46);
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(177, 16, 16, 0.974);
            padding: 20px;
            width: 400px;
        }
        
        h1 {
            color: white;
            text-align: center;
            margin-bottom: 20px;
        }
        
        textarea {
            width: 100%;
            height: 150px;
            border: 1px solid #ccc;
            border-radius: 4px;
            padding: 10px;
            resize: none;
            font-size: 16px;
            margin-bottom: 20px;
        }
        
        input[type="submit"] {
            border: 1px solid tomato;
            background-color: white;
            color: tomato;
            border: none;
            border-radius: 4px;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }
        
        input[type="submit"]:hover {
            color: white;
            background-color: tomato;
        }
    </style>
</head>
<body>
    <div class="feedback-container">
        <h1>Provide Feedback</h1>
        <form action="feedbacks.php" method="post">
            <textarea name="feedback_text" placeholder="Enter your feedback here"></textarea>
            <input type="submit" name="submit_feedback" value="Submit Feedback">
        </form>
    </div>
    
</body>
</html>
