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

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <title>Cineplex Cinemas</title>
  <link href="HomePage99.css" type="text/css" rel="stylesheet">
</head>

<body>

  <div class="CaroConn">

    <?php
    include 'database.php';
    $conn = getConnection();
    $sql = "SELECT title, poster, discription FROM caro1";
    $result = mysqli_query($conn, $sql);

    // Initialize arrays
    $poster = [];
    $title = [];
    $dis = [];


    // Check if the result set is not empty
    if ($result && mysqli_num_rows($result) > 0) {
      // Fetch associative array
      while ($movie = mysqli_fetch_assoc($result)) {
        // Store poster, title, and description in arrays
        $poster[] = $movie['poster'];
        $title[] = $movie['title'];
        $dis[] = $movie['discription'];
      }
    }
    ?>
    <?php

    $sql = "SELECT title, poster, discription FROM caro2";
    $result = mysqli_query($conn, $sql);

    // Initialize arrays
    $poster2 = [];
    $title2 = [];
    $dis2 = [];

    // Check if the result set is not empty
    if ($result && mysqli_num_rows($result) > 0) {
      // Fetch associative array
      while ($movie = mysqli_fetch_assoc($result)) {
        // Store poster, title, and description in arrays
        $poster2[] = $movie['poster'];
        $title2[] = $movie['title'];
        $dis2[] = $movie['discription'];
      }
    }
    ?>
  </div>
  <!-- Top Of Page -->
  <div class="pagetop">
    <h3 class="vidtag">IN THEATERS MARCH 8</h3>
    <div class="PicLogo"><img src="Images1/dp2.png"></div>

    <div class="video-container">
      <video id="myVideo" autoplay muted loop>
        <source src="Videos/vid4.mp4" type="video/mp4">
      </video>
    </div>

    <div class="btnbw">
      <a href="https://youtu.be/uJMCNJP2ipI?feature=shared" target="_blank" rel="noopener noreferrer">
        <a href="https://youtu.be/uJMCNJP2ipI?feature=shared" class="btn btn-outline-light btn-outline">WATCH
          TRAILER</a>
      </a>
    </div>



  </div>

  <!-- Now Showing -->
  <div class="color-box">
    <div class="container">
      <div class="slide">
        <div class="item" style="background-image: url('<?php echo $poster2[0]; ?>');">
          <div class="content">
            <div class="now">Now Showing</div>
            <div class="name">
              <?php echo $title2[0]; ?>
            </div>
            <div class="des">
              <?php echo $dis2[0]; ?>
            </div>
            <button type="button" id="btnca1" class="btn btn-outline-light btn-outline">BOOK NOW</button>
            <a href="https://youtu.be/otNh9bTjXWg?feature=shared" class="btn btn-outline-light btn-outline">WATCH
              TRAILER</a>
            <script>
              document.getElementById("btnca1").addEventListener("click", function () {
                window.location.href = "ticketing1.php?id=<?php echo $title2[0]; ?>";
              });
            </script>
          </div>

        </div>
        <div class="item" style="background-image: url('<?php echo $poster2[1]; ?>');">
          <div class="content">
            <div class="now">Now Showing</div>
            <div class="name">
              <?php echo $title2[1]; ?>
            </div>
            <div class="des">
              <?php echo $dis2[1]; ?>
            </div>
            <button type="button" id="btnca2" class="btn btn-outline-light btn-outline">BOOK NOW</button>
            <a href="https://youtu.be/UtjH6Sk7Gxs?feature=shared" class="btn btn-outline-light btn-outline">WATCH
              TRAILER</a>
            <script>
              document.getElementById("btnca2").addEventListener("click", function () {
                window.location.href = "ticketing1.php?id=<?php echo $title2[1]; ?>";
              });
            </script>
          </div>
        </div>
        <div class="item" style="background-image: url('<?php echo $poster2[2]; ?>');">
          <div class="content">
            <div class="now">Now Showing</div>
            <div class="name">
              <?php echo $title2[2]; ?>
            </div>
            <div class="des">
              <?php echo $dis2[2]; ?>
            </div>
            <button type="button" id="btnca3" class="btn btn-outline-light btn-outline">BOOK NOW</button>
            <a href="https://youtu.be/otNh9bTjXWg?feature=shared" class="btn btn-outline-light btn-outline">WATCH
              TRAILER</a>
            <script>
              document.getElementById("btnca3").addEventListener("click", function () {
                window.location.href = "ticketing1.php?id=<?php echo $title2[2]; ?>";
              });
            </script>
          </div>
        </div>
        <div class="item" style="background-image: url('<?php echo $poster2[3]; ?>');">
          <div class="content">
            <div class="now">Now Showing</div>
            <div class="name">
              <?php echo $title2[3]; ?>
            </div>
            <div class="des">
              <?php echo $dis2[3]; ?>
            </div>
            <button type="button" id="btnca4" class="btn btn-outline-light btn-outline">BOOK NOW</button>
            <a href="https://youtu.be/otNh9bTjXWg?feature=shared" class="btn btn-outline-light btn-outline">WATCH
              TRAILER</a>
            <script>
              document.getElementById("btnca4").addEventListener("click", function () {
                window.location.href = "ticketing1.php?id=<?php echo $title2[3]; ?>";
              });
            </script>
          </div>
        </div>
        <div class="item" style="background-image: url('<?php echo $poster2[4]; ?>');">
          <div class="content">
            <div class="now">Now Showing</div>
            <div class="name">
              <?php echo $title2[4]; ?>
            </div>
            <div class="des">
              <?php echo $dis2[4]; ?>
            </div>
            <button type="button" id="btnca5" class="btn btn-outline-light btn-outline">BOOK NOW</button>
            <a href="https://youtu.be/otNh9bTjXWg?feature=shared" class="btn btn-outline-light btn-outline">WATCH
              TRAILER</a>
            <script>
              document.getElementById("btnca5").addEventListener("click", function () {
                window.location.href = "ticketing1.php?id=<?php echo $title2[4]; ?>";
              });
            </script>
          </div>
        </div>
        <div class="item" style="background-image: url('<?php echo $poster2[5]; ?>');">
          <div class="content">
            <div class="now">Now Showing</div>
            <div class="name">
              <?php echo $title2[5]; ?>
            </div>
            <div class="des">
              <?php echo $dis2[5]; ?>
            </div>
            <button type="button" id="btnca6" class="btn btn-outline-light btn-outline">BOOK NOW</button>
            <a href="https://youtu.be/otNh9bTjXWg?feature=shared" class="btn btn-outline-light btn-outline">WATCH
              TRAILER</a>
            <script>
              document.getElementById("btnca6").addEventListener("click", function () {
                window.location.href = "ticketing1.php?id=<?php echo $title2[5]; ?>";
              });
            </script>
          </div>
        </div>
      </div>
      <div class="button">
        <button class="prev"><i class="fa-solid fa-arrow-left"></i></button>
        <button class="next"><i class="fa-solid fa-arrow-right"></i></button>
      </div>
    </div>
  </div>

  <!-- UP COMMINGS -->
  <div class="margin">
    <div class="h4 pb-2 mb-4 text-white border-bottom border-white"
      style="font-size: 40px; margin-left: -20px; font-weight: bold; font-family: Verdana, Geneva, Tahoma, sans-serif; padding-left: 200px;">
      UP-COMINGS
    </div><br><br>
    <div id="carouselExample" class="carousel slide">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="card-group">
            <div class="card rounded-2">
              <img src="<?php echo $poster[0] ?>" class="card-img-top rounded-1" style="height: 400px; width:auto;"
                alt="...">
              <div class="card-body">
                <h5 class="card-title">
                  <?php echo $title[0]; ?>
                </h5>
                <p class="card-text">
                  <?php echo $dis[0]; ?>
                </p>
                <button type="button" class="btn btn-outline-light btn-outline"
                  style="margin-left:73px; background-color: #f2f2f2; color: #999; cursor: not-allowed;" disabled>BOOK
                  NOW</button><br><br>
                <a href="https://youtu.be/7mgu9mNZ8Hk?feature=shared" target="_blank">
                  <button type="button" class="btn btn-outline-light btn-outline" style="margin-left:58px;">WATCH
                    TRAILER</button>
                </a>
              </div>
            </div>
            <div class="card rounded-2">
              <img src="<?php echo $poster[1] ?>" class="card-img-top rounded-1" style="height: 400px;" alt="...">
              <div class="card-body">
                <h5 class="card-title">
                  <?php echo $title[1]; ?>
                </h5>
                <p class="card-text">
                  <?php echo $dis[1]; ?>
                </p>
                <button type="button" class="btn btn-outline-light btn-outline"
                  style="margin-left:73px; background-color: #f2f2f2; color: #999; cursor: not-allowed;" disabled>BOOK
                  NOW</button><br><br>
                <a href="https://youtu.be/s_76M4c4LTo?feature=shared" target="_blank">
                  <button type="button" class="btn btn-outline-light btn-outline" style="margin-left:58px;">WATCH
                    TRAILER</button>
                </a>
              </div>
            </div>
            <div class="card rounded-2">
              <img src="<?php echo $poster[2] ?>" class="card-img-top rounded-1" style="height: 400px;" alt="...">
              <div class="card-body">
                <h5 class="card-title">
                  <?php echo $title[2]; ?>
                </h5>
                <p class="card-text">
                  <?php echo $dis[2]; ?>
                </p>
                <button type="button" class="btn btn-outline-light btn-outline"
                  style="margin-left:73px; background-color: #f2f2f2; color: #999; cursor: not-allowed;" disabled>BOOK
                  NOW</button><br><br>
                <a href="https://youtu.be/cQfo0HJhCnE?feature=shared" target="_blank">
                  <button type="button" class="btn btn-outline-light btn-outline" style="margin-left:58px;">WATCH
                    TRAILER</button>
                </a>
              </div>
            </div>
            <div class="card rounded-2">
              <img src="<?php echo $poster[3] ?>" class="card-img-top rounded-1" style="height: 400px;" alt="...">
              <div class="card-body">
                <h5 class="card-title">
                  <?php echo $title[3]; ?>
                </h5>
                <p class="card-text">
                  <?php echo $dis[3]; ?>
                </p>
                <button type="button" class="btn btn-outline-light btn-outline"
                  style="margin-left:73px; background-color: #f2f2f2; color: #999; cursor: not-allowed;" disabled>BOOK
                  NOW</button><br><br>
                <a href="https://youtu.be/otNh9bTjXWg?feature=shared" target="_blank">
                  <button type="button" class="btn btn-outline-light btn-outline" style="margin-left:58px;">WATCH
                    TRAILER</button>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="card-group">
            <div class="card rounded-2">
              <img src="<?php echo $poster[4] ?>" class="card-img-top rounded-1" style="height: 400px;" alt="...">
              <div class="card-body">
                <h5 class="card-title">
                  <?php echo $title[4]; ?>
                </h5>
                <p class="card-text">
                  <?php echo $dis[4]; ?>
                </p>
                <button type="button" class="btn btn-outline-light btn-outline"
                  style="margin-left:73px; background-color: #f2f2f2; color: #999; cursor: not-allowed;" disabled>BOOK
                  NOW</button><br><br>
                <a href="https://youtu.be/ajw425Kuvtw?feature=shared" target="_blank">
                  <button type="button" class="btn btn-outline-light btn-outline" style="margin-left:58px;">WATCH
                    TRAILER</button>
                </a>
              </div>
            </div>
            <div class="card rounded-2">
              <img src="<?php echo $poster[5] ?>" class="card-img-top rounded-1" style="height: 400px;" alt="...">
              <div class="card-body">
                <h5 class="card-title">
                  <?php echo $title[5]; ?>
                </h5>
                <p class="card-text">
                  <?php echo $dis[5]; ?>
                </p>
                <button type="button" class="btn btn-outline-light btn-outline"
                  style="margin-left:73px; background-color: #f2f2f2; color: #999; cursor: not-allowed;" disabled>BOOK
                  NOW</button><br><br>
                <a href="https://youtu.be/_inKs4eeHiI?feature=shared" target="_blank">
                  <button type="button" class="btn btn-outline-light btn-outline" style="margin-left:58px;">WATCH
                    TRAILER</button>
                </a>
              </div>
            </div>
            <div class="card rounded-2">
              <img src="<?php echo $poster[6] ?>" class="card-img-top rounded-1" style="height: 400px;" alt="...">
              <div class="card-body">
                <h5 class="card-title">
                  <?php echo $title[6]; ?>
                </h5>
                <p class="card-text">
                  <?php echo $dis[6]; ?>
                </p>
                <button type="button" class="btn btn-outline-light btn-outline"
                  style="margin-left:73px; background-color: #f2f2f2; color: #999; cursor: not-allowed;" disabled>BOOK
                  NOW</button><br><br>
                <a href="https://youtu.be/U2Qp5pL3ovA?feature=shared" target="_blank">
                  <button type="button" class="btn btn-outline-light btn-outline" style="margin-left:58px;">WATCH
                    TRAILER</button>
                </a>
              </div>
            </div>
            <div class="card rounded-2">
              <img src="<?php echo $poster[7] ?>" class="card-img-top rounded-1" style="height: 400px;" alt="...">
              <div class="card-body">
                <h5 class="card-title">
                  <?php echo $title[7]; ?>
                </h5>
                <p class="card-text">
                  <?php echo $dis[7]; ?>
                </p>
                <button type="button" class="btn btn-outline-light btn-outline"
                  style="margin-left:73px; background-color: #f2f2f2; color: #999; cursor: not-allowed;" disabled>BOOK
                  NOW</button><br><br>
                <a href="https://youtu.be/fFtdbEgnUOk?feature=shared" target="_blank">
                  <button type="button" class="btn btn-outline-light btn-outline" style="margin-left:58px;">WATCH
                    TRAILER</button>
                </a>
              </div>
            </div>
          </div>
        </div>


        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
      <script>
        // Get the carousel element
        var carousel = document.getElementById('carouselExample');

        // Create an interval to switch to the next slide every 5 seconds (5000 milliseconds)
        setInterval(function () {
          var nextButton = carousel.querySelector('.carousel-control-next');
          nextButton.click();
        }, 5000);
      </script>
    </div>
  </div>

  <div class="ads">
    <div class="h4 pb-2 mb-4 text-white border-bottom border-white"
      style="font-size: 40px; margin-left: -20px; margin-top: 5%; font-weight: bold; font-family: Verdana, Geneva, Tahoma, sans-serif; padding-left: 200px;">
      DEALS AND EXCLUSIVES
    </div><br><br>



    <!-- Advertisement post 1 -->
    <div class="ad1">
      <div class="imgleft">
        <img src="Images1/imgad1.jpeg" alt="Advertisement 1">
      </div>
      <div class="txtright">
        <h2>STREAMING NOW !</h2>
        <p>"Memories in Melodies" is the latest album from the talented vocal group, The Harmonizers. With their
          signature harmonies and captivating melodies, this album takes listeners on a nostalgic journey through life's
          highs and lows. From soulful ballads to upbeat anthems, each track is a heartfelt reflection of the human
          experience.
          The album opens with "Echoes of Yesterday," a poignant tribute to cherished memories of the past. As the
          journey unfolds, listeners are treated to tracks like "In the Moment," a celebration of living life to the
          fullest, and "Whispers in the Wind," a contemplative ode to lost love.
          Throughout "Memories in Melodies," The Harmonizers showcase their exceptional vocal talent and emotive
          storytelling. With lush arrangements and heartfelt lyrics, this album resonates with listeners of all ages,
          inviting them to immerse themselves in the beauty of music and memories.</p>
      </div>
    </div>

    <!-- Advertisement post 2 -->
    <div class="ad1">
      <div class="imgleft">
        <img src="Images1/imgad2.jpeg" alt="Advertisement 1">
      </div>
      <div class="txtright">
        <h2>SUMMER SHADES</h2>
        <p>Get ready for the sunny days ahead with our latest collection of summer shades! Whether you're lounging on
          the beach, exploring the city, or hitting the trails, our stylish sunglasses offer the perfect blend of
          fashion and function.
          Shop Now: Browse our online store and find the perfect pair of summer shades to elevate your look and protect
          your eyes in style. Don't let the sun cramp your style - embrace the sunshine with confidence and flair!
        </p>
      </div>
    </div>

    <!-- Advertisement post 3 -->
    <div class="ad1">
      <div class="imgleft">
        <img src="Images1/imgad3.jpeg" alt="Advertisement 1">
      </div>
      <div class="txtright">
        <h2>Introducing Our Luxurious VIP Room</h2>
        <p>Step into a world of unparalleled luxury with the grand opening of our exclusive VIP room. Designed to
          redefine the movie-going experience, our VIP room offers an opulent retreat where comfort meets
          sophistication.<br>
          Luxurious Seating: Sink into plush, oversized recliners equipped with adjustable headrests and ample legroom.
          Experience ultimate relaxation as you unwind in style.
          Personalized Service: Our dedicated staff is on hand to cater to your every need, from gourmet snacks and
          refreshments to personalized concierge assistance. Sit back, relax, and let us take care of the details.
          State-of-the-Art Technology: Immerse yourself in crystal-clear visuals and surround sound with our
          cutting-edge audiovisual technology. Enjoy the latest blockbusters in stunning clarity and detail.
          Exclusive Amenities: Indulge in a range of exclusive amenities, including private restrooms, complimentary
          coat check, and priority access to concessions. Your comfort and convenience are our top priorities.
          Intimate Atmosphere: Escape the crowds and enjoy a more intimate movie-watching experience in our VIP room.
          With limited seating and reserved seating options, you'll feel like a VIP from the moment you arrive.</p>
      </div>
    </div>
    <!-- Advertisement post 4 -->
    <div class="ad1">
      <div class="imgleft">
        <img src="Images1/imgad4.jpeg" alt="Advertisement 1">
      </div>
      <div class="txtright">
        <h2>MOVIE NIGHT</h2>
        <p>Get ready for an enchanting evening of cinematic delights with our Movie Night Under the Stars event. Join us
          as we transform our outdoor space into a magical open-air theater, where the beauty of nature meets the magic
          of the silver screen.<br><br>
          Outdoor Cinema: Experience the thrill of watching your favorite movies on the big screen, surrounded by the
          beauty of the great outdoors. Our state-of-the-art projection technology ensures crisp, clear images that
          rival any indoor theater.<br>
          Family-Friendly Fun: Gather your loved ones and make memories together under the stars. Whether you're
          snuggled up with blankets or lounging in cozy chairs, Movie Night Under the Stars offers something for
          everyone to enjoy.<br>
          Blockbuster Selection: From timeless classics to the latest Hollywood hits, our curated lineup of films caters
          to all tastes and preferences. Whether you're in the mood for action-packed adventures, heartwarming romances,
          or laugh-out-loud comedies, we've got you covered.<br>
          Delicious Snacks: Treat your taste buds to a variety of delectable snacks and refreshments available at our
          concession stand. From freshly popped popcorn and gourmet hot dogs to ice-cold beverages and sweet treats,
          we've got all your cravings covered.</p>
      </div>
    </div>
  </div>







  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
  <script src="JS/HomePage.js"></script>
  <?php include 'Footer2.php' ?>

</body>

</html>