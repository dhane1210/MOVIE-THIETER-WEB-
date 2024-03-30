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

?>

<?php
include 'database.php';
$conn = getConnection();

if (isset($_GET['id'])) {
    $data = $_GET['id'];
    if ($data) {
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

<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['selected_seats'])) {
    // Start a transaction to ensure atomicity
    $conn->begin_transaction();

    try {
        // Insert into seat_reservations
        $selectedSeats = isset($_POST['selected_seats']) ? $_POST['selected_seats'] : array();
        $sql_reservation = "INSERT INTO seat_reservations (user_id) VALUES (?)";
        $stmt_reservation = $conn->prepare($sql_reservation);

        if ($stmt_reservation === false) {
            throw new Exception("Error preparing reservation statement: " . $conn->error);
        }

        // Bind parameter and execute the reservation statement
        $stmt_reservation->bind_param("i", $userId);
        $userId = 1; // You should replace this with the actual user ID or identifier
        $stmt_reservation->execute();

        // Get the generated reservation ID
        $reservationId = $stmt_reservation->insert_id;

        // Concatenate selected seat numbers into a string
        $seatNumbersString = implode(',', $selectedSeats);

        // Insert into reserved_seats with concatenated seat numbers
        $sql_seats = "INSERT INTO reserved_seats (reservation_id, seat_number) VALUES (?, ?)";
        $stmt_seats = $conn->prepare($sql_seats);

        if ($stmt_seats === false) {
            throw new Exception("Error preparing seats statement: " . $conn->error);
        }

        // Bind parameters and execute the seats statement
        $stmt_seats->bind_param("is", $reservationId, $seatNumbersString);
        $stmt_seats->execute();

        // Commit the transaction
        $conn->commit();
    } catch (Exception $e) {
        // Rollback the transaction in case of an error
        $conn->rollback();
        die("Transaction failed: " . $e->getMessage());
    } finally {
        // Close the statements
        $stmt_reservation->close();
        $stmt_seats->close();
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>
        <?php echo isset($title) ? $title : "No title found"; ?>
    </title>
    <link href="ticket2.css" rel="stylesheet">
</head>

<body>
    
    <div class="booking">
        <div>
            <h2 class="title">
                <?php echo isset($title) ? $title : "No title found"; ?>
            </h2>
        </div>
        <br>

        <div>
            <h2 class="buytick">BUY TICKETS NOW</h2>
        </div>
        <br>

        <div class="img1">
            <img src="<?php echo isset($poster) ? $poster : "No poster found"; ?>" />
        </div>
        <br><br>

        <div>
            <p class="par">
                <?php echo isset($dis) ? $dis : "No description found"; ?>
            </p>
        </div>

    </div>


    <?php
    $conn = getConnection();

    if (isset($_POST['submit'])) {
        $fNameErr = $pNumberErr = "";
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
                 VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($insert_query);
        $stmt->bind_param("ssssssssi", $title, $_POST["theatre"], $_POST["type"], $_POST["date"], $_POST["hour"], $_POST["fName"], $_POST["lName"], $_POST["pNumber"], $selectedSeats);
        $stmt->execute();
        $stmt->close();
    }
    ?>
<div class="line-separator"></div>
    <div class="booking-form-container">
        <form action="" method="POST">
            <div class="h4 pb-2 mb-4 text-white border-bottom border-white"
                style="font-size: 30px; margin-left: 100px; font-weight: bold; font-family: Verdana, Geneva, Tahoma, sans-serif; padding-left: 6px;">
                BOOK NOW
            </div>
            <div class="colored-line"></div>

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

            <div class="container" id="container1"></div>
            <input type="hidden" name="selected_seats[]" id="selected-seats-input">

            <button type="submit" id="paymentBtn" value="submit" name="submit" class="form-btn">Book a Seat</button>
            <script>document.getElementById('paymentBtn').addEventListener('click', function() {
             alert('BOOKING SUCCESFULL!');
             });</script>

        </form>
    </div>

    <?php include 'seatselection.php' ?>
    
    

</body>

</html>

<?php
// Close the database connection
$conn->close();
?>