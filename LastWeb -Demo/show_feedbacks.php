<?php
// Include database connection
include 'database.php';

// Get connection
$conn = getConnection();

// Query to select all data from user_feedbacks table
$sql = "SELECT * FROM user_feedbacks";

// Execute query
$result = mysqli_query($conn, $sql);

// Check if there are any rows returned
if (mysqli_num_rows($result) > 0) {
    // Initialize a variable to store the HTML content
    $output = '<h2>User Feedbacks</h2>';
    $output .= '<table>';
    $output .= '<tr><th>Feedback ID</th><th>User ID</th><th>Feedback Text</th></tr>';

    // Fetch rows from the result set
    while ($row = mysqli_fetch_assoc($result)) {
        $output .= '<tr>';
        $output .= '<td>' . $row['feedback_id'] . '</td>';
        $output .= '<td>' . $row['user_id'] . '</td>';
        $output .= '<td>' . $row['feedback_text'] . '</td>';
        $output .= '</tr>';
    }

    $output .= '</table>';

    // Echo the HTML content
    echo $output;
} else {
    // If no rows returned, display a message
    echo "No feedbacks found.";
}

// Close connection
mysqli_close($conn);
?>
