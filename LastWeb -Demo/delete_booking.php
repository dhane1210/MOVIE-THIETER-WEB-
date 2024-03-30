<?php
include 'database.php';
$conn = getConnection();

// Check if the booking ID is set in the POST data
if (isset($_POST['bookingId'])) {
    // Sanitize the input to prevent SQL injection
    $bookingId = mysqli_real_escape_string($conn, $_POST['bookingId']);

    // SQL query to delete the booking
    $sql = "DELETE FROM bookings WHERE booking_id = '$bookingId'";

    if (mysqli_query($conn, $sql)) {
        echo "Booking deleted successfully";
    } else {
        echo "Error deleting booking: " . mysqli_error($conn);
    }
} else {
    echo "Booking ID not provided";
}

// Close the database connection
mysqli_close($conn);
?>
