<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: Login1.php");
    exit(); // Exit to prevent further execution
}
if (isset($_SESSION["user"])) {
    $userLoggedIn = true;
} else {
    $userLoggedIn = false;
}

if ($userLoggedIn) {
    include("navbarloggedin.php");
} else {
    include("nav2.php");
}

// Include the database connection file
include 'database.php';

// Retrieve user details from the database
$user_id = $_SESSION['user'];

// Initialize variables to store user details
$full_name = "";
$email = "";

// Establish a database connection
$conn = getConnection();

// Prepare and execute SQL query to retrieve user details
$sql = "SELECT full_name, email FROM users WHERE id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $user_id);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $full_name, $email);
mysqli_stmt_fetch($stmt);
mysqli_stmt_close($stmt);

// Initialize success message variable
$success_message = "";

// Process feedback submission if form is submitted
if (isset($_POST["submit_feedback"])) {
    // Re-establish the database connection
    $conn = getConnection();

    // Extract feedback data from the form
    $feedback_text = $_POST["feedback_text"];

    // Insert feedback into user_feedbacks table
    $sql = "INSERT INTO user_feedbacks (user_id, feedback_text) VALUES (?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "is", $user_id, $feedback_text);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    // Close the database connection
    mysqli_close($conn);

    // Set success message
    $success_message = "Feedback submitted successfully!";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>FeedBack</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: rgb(33, 33, 45);
            margin: 0;
            padding: 0;
        }

        .container {
            margin-top: 10%;
            color: white;
            max-width: 800px;
            background-color: rgb(29, 29, 46);
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 0 10px rgba(177, 16, 16, 0.974);
        }

        h1 {
            text-align: center;
            color: white;
        }

        .profile-info {
            margin-bottom: 20px;
        }

        .profile-info p {
            font-size: 18px;
            margin: 10px 0;
        }

        .profile-info strong {
            font-weight: bold;
            color: white;
        }

        .edit-profile-btn {
            display: block;
            width: 150px;
            margin: 0 auto;
            padding: 10px;
            text-align: center;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .edit-profile-btn:hover {
            background-color: #0056b3;
        }

        /* Style for the feedback form */
        .feedback-form {
            margin-top: 20px;
            background-color: rgb(29, 29, 46);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            box-shadow: 0 0 10px rgba(177, 16, 16, 0.974);
        }

        .feedback-form h2 {
            margin-top: 0;
            color: white;
        }

        .feedback-form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            resize: none;
        }

        .feedback-form input[type="submit"] {
            border: 2px solid tomato;
            background-color: white;
            font-weight: bold;
            color: tomato;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .feedback-form input[type="submit"]:hover {
            background-color: tomato;
            color: white;
        }

        .alert {
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Welcome <?php echo $full_name; ?>!</h1>
        <!-- Display success message if it's set -->
        <?php if (!empty($success_message)): ?>
            <div class="alert alert-success" role="alert">
                <?php echo $success_message; ?>
            </div>
        <?php endif; ?>
        <div class="profile-info">
            <p><strong>User ID: </strong>
                <?php echo $user_id; ?>
            </p>
            <p><strong>Full Name:</strong>
                <?php echo $full_name; ?>
            </p>
            <p><strong>Email:</strong>
                <?php echo $email; ?>
            </p>
            <!-- Add more user details here if needed -->
        </div>
        <!-- Feedback Form -->
        <div class="feedback-form">
            <h2>Provide Feedback</h2>
            <form action="userpro.php" method="post">
                <textarea name="feedback_text" rows="4" cols="50" placeholder="Enter your feedback here"></textarea>
                <br>
                <input type="submit" name="submit_feedback" value="Submit Feedback">
            </form>
        </div>
        
    </div>
</body>

</html>
