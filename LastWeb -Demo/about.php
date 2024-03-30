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
    <title>Welcome to Cineplex Cinemas Kandy!</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            font-family: Arial, sans-serif;
            padding: 0;
            background-color: rgb(33, 33, 45);
        }

        .welcome-section {
            margin-bottom: 8%;
            margin-top: 8%;
            padding: 20px;
            background-color: rgb(29, 29, 46);
            border-radius: 10px;
            max-width: 1000px;
            box-shadow: 0px 0px 20px tomato;
        }

        .welcome-header h2 {
            font-size: 28px;
            color: white;
            margin-bottom: 10px;
        }

        .welcome-description p {
            color: white;
            font-size: 16px;
            line-height: 1.6;
            color: white;
        }

        .offerings {
            margin-top: 20px;
        }

        .offer-list {
            list-style: none;
            padding: 0;
        }

        .offer-item {
            margin-bottom: 20px;
            border-bottom: 1px solid #ccc;
            padding-bottom: 20px;
        }

        .offer-details h4 {
            font-size: 18px;
            color: white;
            margin-bottom: 5px;
        }

        .offer-details p {
            font-size: 16px;
            color: white;
        }

        .theatre-img {
            box-shadow: 0 0 10px rgba(177, 16, 16, 0.974);
            width: 450px;
            height: 600px;
            background-size: cover;
            border-radius: 5px;
            margin-left: 20px;
            display: inline-block;
        }

        .sound-img {
            box-shadow: 0 0 10px rgba(177, 16, 16, 0.974);

            width: 920px;
            height: 500px;
            background-size: cover;
            border-radius: 5px;
            margin-left: 20px;
            display: inline-block;
        }

        .parking-img {
            box-shadow: 0 0 10px rgba(177, 16, 16, 0.974);
            width: 920px;
            height: 500px;
            background-size: cover;
            border-radius: 5px;
            margin-left: 20px;
            display: inline-block;
        }

        .t1 {
            background-image: url('Images1/bck51.jpg');
        }

        .t2 {
            background-image: url('Images1/bck52.jpg');
        }

        .img1 {
            background-image: url('Images1/bck57.jpg');
        }

        .img2 {
            background-image: url('Images1/bck55.jpg');
        }

        .img3 {
            background-image: url('Images1/bck56.jpg');
        }

        .welcome-footer p {
            font-size: 16px;
            line-height: 1.6;
            color: white;
        }
    </style>
</head>

<body>
    <section class="welcome-section">
        <div class="welcome-header">
            <h2>Welcome to Cineplex Cinemas Kandy!</h2>
        </div>

        <div class="welcome-description">
            <p>
            Cineplex Cinemas Kandy is a renowned movie theater located in the heart of Kandy, a city known for its rich cultural heritage and picturesque surroundings in Sri Lanka. Established with the aim of providing top-notch entertainment to movie enthusiasts, Cineplex Cinemas Kandy offers an exceptional cinematic experience for its audience.
            </p>
            <li class="offer-item">
                <div class="offer-details">
                </div>
                <div class="parking-img img3"></div>
            </li>
        </div>

        <div class="offerings">
            <h3>We Offer You :</h3>
            <ul class="offer-list">
                <li class="offer-item">
                    <div class="offer-details">
                        <h4>2 Theatres</h4>
                        <p>Offering both 3D and 2D screenings</p>
                    </div>
                    <div class="theatres-images">
                        <div class="theatre-img t1"></div>
                        <div class="theatre-img t2"></div>
                    </div>
                </li>
                <li class="offer-item">
                    <div class="offer-details">
                        <h4>Dolby Atmos Sound</h4>
                        <p>Immerse yourself in the rich and powerful audio experience</p>
                    </div>
                    <div class="sound-img img1"></div>
                </li>
                <li class="offer-item">
                    <div class="offer-details">
                        <h4>Parking Available</h4>
                        <p>Hassle-free parking for your convenience</p>
                    </div>
                    <div class="parking-img img2"></div>
                </li>
            </ul>
        </div>

        <div class="welcome-footer">
            <p>
                Whether you're a movie enthusiast or just looking for a great time with friends and family, Cineplex
                Cinemas Kandy is the perfect destination. Join us for an incredible cinematic journey where every detail
                is designed to enhance your movie-watching pleasure.
            </p>
        </div>
    </section>
    
</body>

</html>