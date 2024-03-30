<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" 
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="NavBar.css" rel="stylesheet">

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light " id="van">
        <div class="container-fluid">
          <a class="navbar-brand" href="about.html">
            <img src="Images1/logo.png" alt="Logo" class="logo">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          </a>
          <div class="collapse navbar-collapse" id="navbarNav">
             <ul class="navbar-nav mx-auto">
              <li class="nav-item">
                <a class="nav-link" href="HomePage.html">HOME</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="Bytickets.html">Buy Tickets</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="Movies.html">Movies</a>
              </li>
              <li class="nav-item">
                <a class="loginbtn" href="Login.php">LOGIN</a>
              </li>
             </ul>
             <form action="">
              <input type="search" placeholder="Search here ...">
              <i class="fa fa-search"></i>
             </form>
          </div>
        </div>
      </nav>
</body>
</html>