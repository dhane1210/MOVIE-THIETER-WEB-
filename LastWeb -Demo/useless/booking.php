<!DOCTYPE html>
<html lang="en">
<?php 

$id = $_GET['id'];
$link = mysqli_connect("localhost:4306", "root", "", "moviethieter");

$movieQuery = "SELECT * FROM caro2 WHERE movieID = $id"; 
$movieImageById = mysqli_query($link,$movieQuery);
$row = mysqli_fetch_array($movieImageById);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="booking.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title><?php echo $title2[0]; ?></title>
</head>
<body>
    
<body style="background-color:#6e5a11;">

                    <?php 
include 'database.php';
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
                        
    $insert_query = "INSERT INTO bookings (movieName, bookingTheatre, bookingType, bookingDate, bookingTime, bookingFName, bookingLName, bookingPNumber)
                    VALUES ('', '".$_POST["theatre"]."', '".$_POST["type"]."', '".$_POST["date"]."', '".$_POST["hour"]."', '".$_POST["fName"]."', '".$_POST["lName"]."', '".$_POST["pNumber"]."')";
    mysqli_query($conn, $insert_query);
}
?>
                    
   

<div class="booking-form-container">
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

                    <button type="submit" value="submit" name="submit" class="form-btn">Book a Seat</button>
                    
                </form>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
</body>
</html>