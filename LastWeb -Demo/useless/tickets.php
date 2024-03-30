<?php
    include 'database.php';
    $conn = getConnection();

    if(isset($_GET['id'])) {
        $data = $_GET['id'];
        if($data) {
            // Use prepared statement to prevent SQL injection
            $sql = "SELECT id FROM caro2 WHERE title = ?";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "s", $data);
            mysqli_stmt_execute($stmt);
            
            $result = mysqli_stmt_get_result($stmt);
            
            if ($result) {
                $row = mysqli_fetch_assoc($result);
                if ($row) {
                    $id = $row['id'];
                    
                    // Fetch title using the fetched id
                    $sql1 = "SELECT title, discription, poster, yt FROM caro2 WHERE id = ?";
                    $stmt1 = mysqli_prepare($conn, $sql1);
                    mysqli_stmt_bind_param($stmt1, "i", $id);
                    mysqli_stmt_execute($stmt1);
                    
                    $result1 = mysqli_stmt_get_result($stmt1);
                    
                    if ($result1) {
                        $row1 = mysqli_fetch_assoc($result1);
                        if ($row1) {
                            $title = $row1["title"];
                            $dis = $row1["discription"];
                            $poster = $row1["poster"];
                            $yt = $row1["yt"];
                        }
                    }
                }
            }
        }
    }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="tickets.css" type="text/css" rel="stylesheet">
    <title><?php echo isset($title) ? $title : "No title found"; ?></title>
    <style>
    .container {
      display: grid;
      grid-template-columns: repeat(8, 50px); /* Adjust column count as needed */
      grid-gap: 5px;
      justify-content: center;
    }

    .seat {
      width: 50px;
      height: 50px;
      background-color: #ccc;
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .seat.selected {
      background-color: #ff0000;
    }
  </style>
</head>
<body>
   
    
    <div class="booking">
        <h1>BUY TICKETS</h1>
        <div class="container">
        <?php
        // Check if $yt is set and not empty
        if (isset($yt) && !empty($yt)) {
            // Extract video ID from YouTube URL if it's a full URL
            $video_id = '';
            if (strpos($yt, 'youtube.com') !== false) {
                $query_string = parse_url($yt, PHP_URL_QUERY);
                parse_str($query_string, $params);
                if (isset($params['v'])) {
                    $video_id = $params['v'];
                }
            } else {
                // Otherwise, assume $yt contains only video ID
                $video_id = $yt;
            }
            
            // Embed YouTube video using the video ID
            echo '<iframe width="560" height="315" src="https://www.youtube.com/embed/' . $video_id . '" 
                title="YouTube video player" frameborder="0" 
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                allowfullscreen></iframe>';
        } else {
            echo 'No video found';
        }
        ?>
        </div>
        <br><br>
        <h2 class="title"><?php echo isset($title) ? $title : "No title found"; ?></h2><br><br>
        <div class="img1">
            <img src="<?php echo isset($poster) ? $poster : "No poster found"; ?>"/>
        </div><br><br>
        <p class="par"><?php echo isset($dis) ? $dis : "No description found"; ?></p>
    </div>



<div class="add">
<?php 
$conn = getConnection();

if(isset($_POST['submit'])){
    $fNameErr = $pNumberErr= "";
    $fName = $pNumber = "";
            
    $fName = $_POST['fName'];
    if (!preg_match('/^[a-zA-Z0-9\s]+$/', $fName)) {
        $fNameErr = 'Name can only contain letters, numbers and white spaces';
        echo "<script type='text/javascript'>alert('$fNameErr');</script>";
    }   
            
    $pNumber = $_POST['pNumber'];
    if (preg_match("/^[0-9]{3}-[0-9]{4}-[0-9]{4}$/", $pNumber)) {
        $pNumberErr = 'Phone Number can only contain numbers and white spaces';
        echo "<script type='text/javascript'>alert('$pNumberErr');</script>";
    } 
    
                        
    $insert_query = "INSERT INTO bookings (title, bookingTheatre, bookingType, bookingDate, bookingTime, bookingFName, bookingLName, bookingPNumber, seat)
                     VALUES ('$title', '".$_POST["theatre"]."', '".$_POST["type"]."', '".$_POST["date"]."', '".$_POST["hour"]."', '".$_POST["fName"]."', '".$_POST["lName"]."', '".$_POST["pNumber"]."'";

    mysqli_query($conn, $insert_query);
}
?>
<div class="booking-form-container" id="addfrm">
                <form action="" method="POST">

                    <select name="theatre" required>
                        <option value="" disabled selected>THEATRE</option>
                        <option value="main-hall">Main Hall</option>
                        <option value="vip-hall">VIP Hall</option>
                        <option value="private-hall">Private Hall</option>
                    </select>

                    <select name="type" required>
                        <option value="" disabled selected>TYPE</option>
                        <option value="3d">3D</option>
                        <option value="2d">2D</option>
                        <option value="imax">IMAX</option>
                        <option value="7d">7D</option>
                    </select>

                    <select name="date" required>
                        <option value="" disabled selected>DATE</option>
                        <option value="12-3">March 12,2019</option>
                        <option value="13-3">March 13,2019</option>
                        <option value="14-3">March 14,2019</option>
                        <option value="15-3">March 15,2019</option>
                        <option value="16-3">March 16,2019</option>
                    </select>

                    <select name="hour" required>
                        <option value="" disabled selected>TIME</option>
                        <option value="09-00">09:00 AM</option>
                        <option value="12-00">12:00 AM</option>
                        <option value="15-00">03:00 PM</option>
                        <option value="18-00">06:00 PM</option>
                        <option value="21-00">09:00 PM</option>
                        <option value="24-00">12:00 PM</option>
                    </select>

                    <input placeholder="First Name" type="text" name="fName" required>

                    <input placeholder="Last Name" type="text" name="lName">

                    <input placeholder="Phone Number" type="text" name="pNumber" required>

                    <div class="selected-seats">
                    <p>Selected Seat: <span id="selected-seat"></span></p>
                    <input type="hidden" >
                    </div>

                    <button type="submit" value="submit" name="submit" class="form-btn">Book a Seat</button>
                    
                </form>
        </div>
</div>

<div>
    
<h2>Movie Theater Seat Selection</h2>
  <div class="container" id="container"></div>

  
  <script>
    const container = document.getElementById('container');
    const selectedSeat = document.getElementById('selected-seat');
    let selectedSeats = [];

    // Function to create seats
    function createSeats() {
      const rows = 4;
      const seatsPerRow = 8; // Adjust as needed
      const totalSeats = rows * seatsPerRow;

      for (let i = 1; i <= totalSeats; i++) {
        const seat = document.createElement('div');
        seat.classList.add('seat');
        seat.setAttribute('data-seat', i);
        seat.textContent = i; // Display seat number
        seat.addEventListener('click', () => toggleSeat(seat));
        container.appendChild(seat);
      }
    }

    // Function to toggle seat selection
    function toggleSeat(seat) {
      const seatNumber = parseInt(seat.getAttribute('data-seat'));
      if (selectedSeats.includes(seatNumber)) {
        selectedSeats = selectedSeats.filter(num => num !== seatNumber);
        seat.classList.remove('selected');
      } else {
        selectedSeats.push(seatNumber);
        seat.classList.add('selected');
      }
      selectedSeat.textContent = selectedSeats.join(', ');
    }

    // Initialize
    createSeats();
  </script>
<div>


</body>
</html>