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
    <title>Advertisement Showcase</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: rgb(33, 33, 45);
        }

        .ads {
            margin-top: 7%;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .ad1 {
            margin: 10px;
            background-color: rgb(29, 29, 46);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(168, 33, 33, 0.974);
            transition: transform 0.3s ease-in-out;
            max-width: 1000px;
            /* Adjusted maximum width */
            display: flex;
            /* Added to make the children align horizontally */
        }

        .ad1:hover {
            transform: translateY(-3px);
        }

        .imgleft {
            flex: 1;
            /* Added to make the image take up 1/3 of the container */
        }

        .imgleft img {
            height: 100%;
            width: 100%;
            border-top-left-radius: 20px;
            border-bottom-left-radius: 20px;
            object-fit: cover;
            transition: transform 0.3s ease-in-out;
        }

        .ad1:hover .imgleft img {
            transform: scale(1.1);
        }

        .txtright {
            padding: 20px;
            flex: 2;
            /* Added to make the text take up 2/3 of the container */
        }

        .txtright h2 {
            color: white;
            font-size: 24px;
            margin-top: 5%;
            margin-bottom: 10px;
        }

        .txtright p {
            color: white;
            font-size: 16px;
            margin-top: 0;
            margin-bottom: 30px;
        }

        @media (max-width: 308px) {
            .ad1 {
                width: 90%;
            }
        }
    </style>
</head>

<body>
    <div class="ads">
        <!-- Advertisement post 1 -->
        <div class="ad1">
            <div class="imgleft">
                <img src="Images1/imgad1.jpeg" alt="Advertisement 1">
            </div>
            <div class="txtright">
                <h2>STREAMING NOW !</h2>
                <p>"Memories in Melodies" is the latest album from the talented vocal group, The Harmonizers. With their
                    signature harmonies and captivating melodies, this album takes listeners on a nostalgic journey
                    through life's highs and lows. From soulful ballads to upbeat anthems, each track is a heartfelt
                    reflection of the human experience.
                    The album opens with "Echoes of Yesterday," a poignant tribute to cherished memories of the past. As
                    the journey unfolds, listeners are treated to tracks like "In the Moment," a celebration of living
                    life to the fullest, and "Whispers in the Wind," a contemplative ode to lost love.
                    Throughout "Memories in Melodies," The Harmonizers showcase their exceptional vocal talent and
                    emotive storytelling. With lush arrangements and heartfelt lyrics, this album resonates with
                    listeners of all ages, inviting them to immerse themselves in the beauty of music and memories.</p>
            </div>
        </div>

        <!-- Advertisement post 2 -->
        <div class="ad1">
            <div class="imgleft">
                <img src="Images1/imgad2.jpeg" alt="Advertisement 2">
            </div>
            <div class="txtright">
                <h2>SUMMER SHADES</h2>
                <p>Get ready for the sunny days ahead with our latest collection of summer shades! Whether you're
                    lounging on the beach, exploring the city, or hitting the trails, our stylish sunglasses offer the
                    perfect blend of fashion and function.
                    Shop Now: Browse our online store and find the perfect pair of summer shades to elevate your look
                    and protect your eyes in style. Don't let the sun cramp your style - embrace the sunshine with
                    confidence and flair!
                </p>
            </div>
        </div>

        <!-- Advertisement post 3 -->
        <div class="ad1">
            <div class="imgleft">
                <img src="Images1/imgad3.jpeg" alt="Advertisement 3">
            </div>
            <div class="txtright">
                <h2>Introducing Our Luxurious VIP Room</h2>
                <p>Step into a world of unparalleled luxury with the grand opening of our exclusive VIP room. Designed
                    to redefine the movie-going experience, our VIP room offers an opulent retreat where comfort meets
                    sophistication.<br>
                    Luxurious Seating: Sink into plush, oversized recliners equipped with adjustable headrests and ample
                    legroom. Experience ultimate relaxation as you unwind in style.
                    Personalized Service: Our dedicated staff is on hand to cater to your every need, from gourmet
                    snacks and refreshments to personalized concierge assistance. Sit back, relax, and let us take care
                    of the details.
                    State-of-the-Art Technology: Immerse yourself in crystal-clear visuals and surround sound with our
                    cutting-edge audiovisual technology. Enjoy the latest blockbusters in stunning clarity and detail.
                    Exclusive Amenities: Indulge in a range of exclusive amenities, including private restrooms,
                    complimentary coat check, and priority access to concessions. Your comfort and convenience are our
                    top priorities.
                    Intimate Atmosphere: Escape the crowds and enjoy a more intimate movie-watching experience in our
                    VIP room. With limited seating and reserved seating options, you'll feel like a VIP from the moment
                    you arrive.</p>
            </div>
        </div>

        <!-- Advertisement post 4 -->
        <div class="ad1">
            <div class="imgleft">
                <img src="Images1/imgad4.jpeg" alt="Advertisement 4">
            </div>
            <div class="txtright">
                <h2>MOVIE NIGHT</h2>
                <p>Get ready for an enchanting evening of cinematic delights with our Movie Night Under the Stars event.
                    Join us as we transform our outdoor space into a magical open-air theater, where the beauty of
                    nature meets the magic of the silver screen.<br><br>
                    Outdoor Cinema: Experience the thrill of watching your favorite movies on the big screen, surrounded
                    by the beauty of the great outdoors. Our state-of-the-art projection technology ensures crisp, clear
                    images that rival any indoor theater.<br>
                    Family-Friendly Fun: Gather your loved ones and make memories together under the stars. Whether
                    you're snuggled up with blankets or lounging in cozy chairs, Movie Night Under the Stars offers
                    something for everyone to enjoy.<br>
                    Blockbuster Selection: From timeless classics to the latest Hollywood hits, our curated lineup of
                    films caters to all tastes and preferences. Whether you're in the mood for action-packed adventures,
                    heartwarming romances, or laugh-out-loud comedies, we've got you covered.<br>
                    Delicious Snacks: Treat your taste buds to a variety of delectable snacks and refreshments available
                    at our concession stand. From freshly popped popcorn and gourmet hot dogs to ice-cold beverages and
                    sweet treats, we've got all your cravings covered.</p>
            </div>
        </div>
    </div>
    <?php include 'Footer2.php' ?>
</body>

</html>