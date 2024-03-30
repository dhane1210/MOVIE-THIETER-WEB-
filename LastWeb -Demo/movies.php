
<?php
session_start();
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
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Carousel from caro2 Table</title>
    <style>
        /* Add your CSS styling here */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: rgb(33, 33, 45);
        }

        .carousel-container {
            margin-top: 9%;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .carousel {
            display: flex;
            justify-content: center;
            align-items: center;
            overflow-x: auto;
            /* Enable horizontal scrolling */
            overflow-y: hidden;
            /* Hide vertical scrollbar */
            margin-bottom: 10px;
            /* Add some space between rows */
        }

        .item {
            border-radius: 10px;
            flex: 0 0 auto;
            /* Allow flex items to shrink and grow */
            width: 300px;
            height: 400px;
            margin: 0 10px;
            background-size: cover;
            background-position: center;
            border-radius: 10px;
            position: relative;
            overflow: hidden;
            box-shadow: 0 0 40px rgba(167, 20, 20, 0.934);
            transition: transform 0.3s ease;
        }

        .item:hover {
            transform: translateY(-5px);
        }

        .content {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: rgba(0, 0, 0, 0.5); 
            padding: 10px;
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
            transition: opacity 0.9s ease;
            opacity: 0;
        }

        .item:hover .content {
            opacity: 1;
        }

        .now {
            text-shadow: 3px black;
            color: tomato;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .name,
        .des {
            color: #fff;
            margin-bottom: 10px;
        }

        .btn {
            margin:4px;
            background-color: transparent;

            border: 3px solid #fff;
            color: #fff;
            padding: 8px 16px;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        .btn:hover {
            background-color: #fff;
            color: tomato;
        }

        .btn-outline-light:hover {
            background-color: transparent;
            border-color: tomato;
            color: tomato;
        }
    </style>
</head>

<body>
    <?php
    include 'database.php';
    $conn = getConnection();

    // Fetch data for UP-COMINGS
    $sql = "SELECT title, poster, discription FROM caro2";
    $result = mysqli_query($conn, $sql);

    // Check if the result set is not empty
    if ($result && mysqli_num_rows($result) > 0) {
        // Start container for UP-COMINGS
        echo '<div class="nowshowing">';
        echo '<div class="h4 pb-2 mb-4 text-white border-bottom border-white" style="font-size: 40px; margin-left: -20px; margin-top: 8%; font-weight: bold; font-family: Verdana, Geneva, Tahoma, sans-serif; padding-left: 200px;">NOW SHOWING</div>';
        echo '<br><br>';
        echo '<div class="carousel-container">';

        // Fetch and display each card
        $counter = 0;
        while ($movie = mysqli_fetch_assoc($result)) {
            echo '<div class="item" style="background-image: url(' . $movie['poster'] . ');">';
            echo '<div class="content">';
            echo '<div class="now">NOW SHOWING</div>'; // Change this line to modify the "Now Showing" text
            echo '<div class="name">' . $movie['title'] . '</div>';
            echo '<div class="des">' . $movie['discription'] . '</div>';
            echo '<button type="button" class="btn btn-outline-light btn-outline" onclick="bookTicket(\'' . $movie['title'] . '\')">BOOK NOW</button>';
            echo '<button type="button" class="btn btn-outline-light btn-outline">WATCH TRAILER</button>';
            echo '</div>';
            echo '</div>';
            $counter++;
            if ($counter % 4 == 0) { // Wrap every 4 cards in a new row
                echo '</div>'; // Close previous carousel container
                echo '<div class="carousel-container">'; // Open new carousel container
            }
        }

        // Close the last carousel container
        echo '</div>';
        echo '</div>'; // Close nowshowing container
    }

    // Fetch data for Up commings
    $sql = "SELECT title, poster, discription FROM caro1";
    $result = mysqli_query($conn, $sql);

    // Check if the result set is not empty
    if ($result && mysqli_num_rows($result) > 0) {
        // Start container for Up commings
        echo '<div class="upcommings">';
        echo '<div class="h4 pb-2 mb-4 text-white border-bottom border-white" style="font-size: 40px; margin-left: -20px; margin-top: 8%; font-weight: bold; font-family: Verdana, Geneva, Tahoma, sans-serif; padding-left: 200px;">UP-COMMINGS</div>';
        echo '<br><br>';
        echo '<div class="carousel-container">';

        // Fetch and display each card
        $counter = 0;
        while ($movie = mysqli_fetch_assoc($result)) {
            echo '<div class="item" style="background-image: url(' . $movie['poster'] . ');">';
            echo '<div class="content">';
            echo '<div class="now">COMING SOON..</div>'; // Change this line to modify the "Up-Comings" text
            echo '<div class="name">' . $movie['title'] . '</div>';
            echo '<div class="des">' . $movie['discription'] . '</div>';

            echo '<button type="button" class="btn btn-outline-light btn-outline">WATCH TRAILER</button>';
            echo '</div>';
            echo '</div>';
            $counter++;
            if ($counter % 4 == 0) { // Wrap every 4 cards in a new row
                echo '</div>'; // Close previous carousel container
                echo '<div class="carousel-container">'; // Open new carousel container
            }
        }

        // Close the last carousel container
        echo '</div>';
        echo '</div>'; // Close upcommings container
    }
    ?>

    <script>
        function bookTicket(movieTitle) {
            window.location.href = "ticketing1.php?id=" + encodeURIComponent(movieTitle);
        }
    </script>
    <?php include 'Footer2.php' ?>
</body>

</html>