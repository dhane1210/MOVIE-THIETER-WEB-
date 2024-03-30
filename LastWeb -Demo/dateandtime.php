<?php
$port = 4306;
$hostName = "localhost";
$dbUser = "root";
$dbPassword = ""; 
$dbName = "moviethieter";
$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName, $port);

$sql = "SELECT reserved_seats.reservation_id, reserved_seats.seat_number, seat_reservations.user_id, seat_reservations.reservation_time
        FROM reserved_seats
        INNER JOIN seat_reservations ON reserved_seats.reservation_id = seat_reservations.reservation_id";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // Output data of each row
    echo "<table>";
    echo "<tr><th>Reservation ID</th><th>Seat Number</th><th>User ID</th><th>Reservation Time</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["reservation_id"] . "</td>";
        echo "<td>" . $row["seat_number"] . "</td>";
        echo "<td>" . $row["user_id"] . "</td>";
        echo "<td>" . $row["reservation_time"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

mysqli_close($conn);
?>
