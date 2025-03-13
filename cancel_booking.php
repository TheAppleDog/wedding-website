<?php
// Start the session
session_start();

// Include your database connection file
include 'admin/include/init.php';

// Check if the booking_id is provided via POST
if(isset($_POST['booking_id'])) {
    $booking_id = $_POST['booking_id'];

    // Perform necessary validation if needed

    // Delete the booking from the database
    $query = "DELETE FROM tblweddingcustomers WHERE booking_id = ?";
    
    // Prepare the statement to avoid SQL injection
    if ($stmt = mysqli_prepare($db->connection, $query)) {
        // Bind the booking_id parameter
        mysqli_stmt_bind_param($stmt, "i", $booking_id);

        // Execute the query
        if (mysqli_stmt_execute($stmt)) {
            // Booking deleted successfully
            echo "success";
        } else {
            // Error executing query
            echo "Error executing query: " . mysqli_error($db->connection);
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        // Error preparing statement
        echo "Error preparing statement: " . mysqli_error($db->connection);
    }
} else {
    // If booking_id is not provided
    echo "Booking ID not provided.";
}
?>
