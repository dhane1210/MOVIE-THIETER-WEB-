<?php
$port = 4306;
$hostName = "localhost";
$dbUser = "root";
$dbPassword = ""; 
$dbName = "moviethieter";
$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName, $port);



$sql = "SELECT * FROM bookings";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // Output data of each row
    echo "<table>";
    echo "<tr><th>ID</th><th>Title</th><th>Theatre</th><th>Type</th><th>Date</th><th>Time</th><th>First Name</th><th>Last Name</th><th>Phone Number</th><th>Seats</th><th>Action</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["booking_id"] . "</td>";
        echo "<td>" . $row["title"] . "</td>";
        echo "<td>" . $row["bookingTheatre"] . "</td>";
        echo "<td>" . $row["bookingType"] . "</td>";
        echo "<td>" . $row["bookingDate"] . "</td>";
        echo "<td>" . $row["bookingTime"] . "</td>";
        echo "<td>" . $row["bookingFName"] . "</td>";
        echo "<td>" . $row["bookingLName"] . "</td>";
        echo "<td>" . $row["bookingPNumber"] . "</td>";
        echo "<td>" . $row["seat"] . "</td>";
        echo "<td><button class='deleteBtn' data-booking-id='" . $row["booking_id"] . "'>Delete</button></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
?>
