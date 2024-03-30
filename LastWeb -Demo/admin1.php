<?php
session_start();
// Check if admin is logged in
if (!isset($_SESSION['admin'])) {
    header("Location: adminlogin.php");
    exit();
}
?>
<?php
include 'database.php';
$conn = getConnection();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="admin1.css">
    <!-- Include jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>ADMIN PANEL</h1>
        </div>
        <div class="main-content">
            <div class="section">
                <h2>Now Showing Carousel</h2>
                <!-- Add your editing options here -->
                <?php include 'nowshowing.php'; ?>
                <p>Placeholder for editing Now Showing carousel</p>
            </div>
            <div class="section">
                <h2>Upcomings Carousel</h2>
                <!-- Add your editing options here -->
                <?php include 'up-commings.php'; ?>
                <p>Placeholder for editing Upcomings carousel</p>
            </div>
            <div class="section">
                <h2>Manage Booking Details</h2>
                <!-- Add the empty div for booking details here -->
                <div id="bookingDetails"></div>

                <form id="showDataForm">
                    <button type="button" id="showDataBtn">Show Data</button>
                </form>
                <form id="showDataForm2">
                    <button type="button" id="showDataBtn2">Show Reserved Seats</button>
                </form>
                <!-- Add a button to show feedbacks -->
                <form id="showFeedbacksForm">
                    <button type="button" id="showFeedbacksBtn">Show Feedbacks</button>
                </form>
                <button onclick="location.href='adminlogout.php'" class="btn">LOGOUT</button>
            </div>
        </div>
        <div class="footer">
            <p>&copy; 2024 Admin Panel</p>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            // Handle button click event for showDataBtn
            $("#showDataBtn").click(function () {
                // Make AJAX request to fetch booking details
                $.ajax({
                    url: "bookingdetails.php", // PHP file to handle database query
                    type: "GET",
                    success: function (response) {
                        // Update the booking details area with fetched data
                        $("#bookingDetails").html(response);
                    },
                    error: function (xhr, status, error) {
                        console.error("Error fetching booking details:", error);
                    }
                });
            });

            // Handle button click event for showDataBtn2
            $("#showDataBtn2").click(function () {
                // Make AJAX request to fetch reserved seats data
                $.ajax({
                    url: "dateandtime.php", // PHP file to handle database query
                    type: "GET",
                    success: function (response) {
                        // Update the booking details area with fetched data
                        $("#bookingDetails").html(response);
                    },
                    error: function (xhr, status, error) {
                        console.error("Error fetching reserved seats data:", error);
                    }
                });
            });

            // Handle button click event for showFeedbacksBtn
            $("#showFeedbacksBtn").click(function () {
                // Make AJAX request to fetch feedbacks
                $.ajax({
                    url: "show_feedbacks.php",
                    type: "GET",
                    success: function (response) {
                        // Update the feedback details area with fetched data
                        $("#bookingDetails").html(response);
                    },
                    error: function (xhr, status, error) {
                        console.error("Error fetching feedbacks:", error);
                    }
                });
            });

            // Handle delete button click event
            $(document).on("click", ".deleteBtn", function () {
                // Get the booking ID from the data attribute
                var bookingId = $(this).data("booking-id");

                // Confirm with the user before deleting
                if (confirm("Are you sure you want to delete this booking?")) {
                    // Make AJAX request to delete the booking
                    $.ajax({
                        url: "delete_booking.php", // PHP file to handle delete operation
                        type: "POST",
                        data: { bookingId: bookingId }, // Pass the booking ID to the server
                        success: function (response) {
                            // Reload the booking details after deletion
                            $("#showDataBtn").trigger("click");
                        },
                        error: function (xhr, status, error) {
                            console.error("Error deleting booking:", error);
                        }
                    });
                }
            });

            // Handle delete button click event for the booking ID form
            $("#deleteBtn").click(function () {
                // Get the booking ID from the input field
                var bookingId = $("#bookingId").val();

                // Confirm with the user before deleting
                if (confirm("Are you sure you want to delete this booking?")) {
                    // Make AJAX request to delete the booking
                    $.ajax({
                        url: "delete_booking.php", // PHP file to handle delete operation
                        type: "POST",
                        data: { bookingId: bookingId }, // Pass the booking ID to the server
                        success: function (response) {
                            // Reload the booking details after deletion
                            $("#showDataBtn").trigger("click");
                        },
                        error: function (xhr, status, error) {
                            console.error("Error deleting booking:", error);
                        }
                    });
                }
            });
        });
    </script>
</body>

</html>
