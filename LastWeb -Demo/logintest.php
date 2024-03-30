<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* CSS for Login Form */
.hidden {
    display: none;
}

.form-container {
    max-width: 400px;
    margin: 50px auto;
}

    </style>
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- Login Button -->
    <button id="loginBtn" class="btn btn-primary">Login</button>

    <!-- Login Form (Initially Hidden) -->
    <div id="loginFormContainer" class="container hidden">
        <div class="form-container">
            <form action="Login1.php" method="post">
                <div class="form-group">
                    <input type="email" placeholder="Enter email" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <input type="password" placeholder="Enter password" name="password" class="form-control">
                </div>
                <div class="form-btn">
                    <input type="submit" value="Login" name="login" class="btn btn-primary">
                </div>
            </form>
            <div><p>Not registered yet? <a href="registration1.php">Register Here</a></p></div>
        </div>
    </div>

    <script>// Get the login button and login form container
const loginBtn = document.getElementById("loginBtn");
const loginFormContainer = document.getElementById("loginFormContainer");

// Add click event listener to login button
loginBtn.addEventListener("click", function() {
    // Toggle the visibility of the login form container
    loginFormContainer.classList.toggle("hidden");
});
</script>
</body>
</html>
