<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <link href="nav22.css" rel="stylesheet">

</head>

<body>
  <!-- nav bar -->
  <nav class="navbar navbar-expand-lg fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand me-auto" href="about.php">CINEPLEX</a>
      <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Cineplex</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav justify-content-center flex-grow-1 pe-3">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="HomePage1.php">HOME</a>
            </li>
            <li class="nav-item">
              <a class="nav-link mx-lg-2" href="movies.php">MOVIES</a>
            </li>
            <li class="nav-item">
              <a class="nav-link mx-lg-2" href="deals.php">DEALS</a>
            </li>
            <li class="nav-item">
              <a class="nav-link mx-lg-2" href="about.php">ABOUT</a>
            </li>
          </ul>

          <div id="search-container">
            <input type="search" id="search-input" placeholder="Search movie....">
            <i class="fa fa-search" id="searchIcon"></i>
          </div>

          <script>
            document.getElementById("searchIcon").addEventListener("click", function () {
              // Get the value entered by the user
              var searchTerm = document.getElementById("search-input").value;
              // Redirect to the ticketing page with the search term as the ID
              window.location.href = "ticketing1.php?id=" + encodeURIComponent(searchTerm);
            });
          </script>

        </div>
      </div>

      <a href="Login1.php" class="login-button">LOGIN</a>
      <button class="navbar-toggler pe-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
        aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>



    </div>
  </nav>
  <!--Navbar End-->
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
  <script src="nav2.js"></script>



</body>

</html>