<?php
// Start the session
session_start();

// Include your database connection file
include 'admin/include/init.php';

// Check if the username is stored in the session
if (isset($_SESSION['user_name'])) {
    $user_name = $_SESSION['user_name'];
    global $db;

    // Initialize an empty array to hold the booking details
    $bookingDetails = [];
//$booking_id = isset($_POST['booking_id']) ? $_POST['booking_id'] : '';
    // Prepare a SQL query to fetch the booking details for the specified username
    $query = "SELECT booking_id, bride, groom, wedding_type, wedding_date, status FROM tblweddingcustomers WHERE user_name = ?";
   
    // Prepare the statement to avoid SQL injection
    if ($stmt = mysqli_prepare($db->connection, $query)) {
        // Bind the username parameter
        mysqli_stmt_bind_param($stmt, "s", $user_name);

        // Execute the query
        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);

            // Fetch the results
            while ($row = mysqli_fetch_assoc($result)) {
                $bookingDetails[] = $row;
            }
        } else {
            echo "Error executing query: " . mysqli_error($db->connection);
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        echo "Error preparing statement: " . mysqli_error($db->connection);
    }

    // Check if booking details were found
    if (!empty($bookingDetails)) {
        // Proceed to display the booking details
    } else {
        echo '<div style="text-align: center; font-size:20px;">No bookings yet...😢</div>';
    }
} else {
    // Handle the case where the username is not set in the session
    echo "User not logged in or session expired.";
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Details</title>
   <script src="https://kit.fontawesome.com/741424920c.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-datepicker@1.9.0/dist/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.materialdesignicons.com/2.1.19/css/materialdesignicons.min.css">
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="include/footer.css">
    <link rel="stylesheet" href="nav.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
<style>
body {
    font-family: "Open Sans", "Roboto", sans-serif;
}

    .booking-details {
    max-width: 1100px;
    margin: 20px auto;
    margin-top: 30px;
    border: 2px solid #FF3BB7;
    box-shadow: 0 6px 6px rgba(255,59,183,0.1); /* Updated box shadow color */
    border-radius: 8px;
    overflow: hidden;
    background: #f9f9f9;    
}  
    .booking-detail {       
        padding: 10px;        
        border-radius: 4px;
    }

    .booking-detail label {
        display: flex;        
        margin-bottom: 5px;
        color: #555;
    }

    .booking-detail::after {
        content: "";
        display: table;
        clear: both;
    }

    hr {
        margin-top: 10px;
        margin-bottom: 10px;
        border: 0;
        border-top: 1px solid #eee;
    }
</style>

</head>
<body>
<?php include 'include/nav.php'; ?><br><br><br>
 <h2 style="text-align: center;"><strong>Your recent Bookings</strong></h2>

    <?php if (!empty($bookingDetails)): ?>

 <?php foreach ($bookingDetails as $detail): ?>

        <div class="booking-details">          
           
                <div class="booking-detail"><label style="font-size: 20px; display: flex; justify-content: space-between; color:black;"><b>Booking ID: #<?= htmlspecialchars($detail['booking_id']) ?>   <?= htmlspecialchars($detail['wedding_type']) ?><b style="margin-left: 420px;">Wedding Date: <?= htmlspecialchars($detail['wedding_date']) ?></b></b></label>
 </div>
               <div class="booking-detail"><label style="font-size: 18px; color:black;"><b>Bride's Name: <?= htmlspecialchars($detail['bride']) ?>&nbsp;&nbsp;&nbsp;&nbsp;Groom's Name: <?=    htmlspecialchars($detail['groom']) ?>
</div>

          <div class="booking-detail" style="font-size: 18px; display: flex; justify-content: space-between; align-items: center;">
   <button style="background-color:#ffffff; color:black;" onclick="viewPaymentDetails(this)" data-booking-id="<?= htmlspecialchars($detail['booking_id']) ?>" data-toggle="modal" data-target="#paymentDetailsModal"><b>Payment Overview</b></button>

  <div>
       <button style="margin-left: 620px; color:white; background-color:red; font-size:16px; height: 30px" onclick="cancelBooking('<?= htmlspecialchars($detail['booking_id']) ?>')"><i class="fa-regular fa-circle-xmark"></i><b> Cancel Booking</b></button>

    </div>
    <div style="margin-left: 10px; border: 3px solid <?= $detail['status'] == 'Confirm' ? 'green' : ($detail['status'] == 'Cancelled' ? 'red' : ($detail['status'] == 'Fraud' ? 'black' : ($detail['status'] == 'Pending' ? 'blue' : 'defaultColor'))) ?>; padding: 0px 10px; height: 30px; line-height: 28px;">
        <b><?= nl2br(htmlspecialchars($detail['status'])) ?></b>
    </div>
</div>
</div>
                <hr>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        </br><p style="text-align: center; font-size:20px;">No bookings yet...😢</p>
    <?php endif; ?>

<!-- Payment Details Modal -->
<div class="modal fade" id="paymentDetailsModal" tabindex="-1" role="dialog" aria-labelledby="paymentDetailsModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
  <form class="form-horizontal" method="POST" action="payment_details.php">
      <div class="modal-header">
        <h4 class="modal-title" id="paymentDetailsModalLabel"><b>Payment Summary</b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Payment details will be loaded here -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

<?php include 'include/footer.php'; ?>

<!-- Bootstrap JS and other scripts -->
<script>
console.log("Script is running");

    function cancelBooking(booking_id) {
        // Confirm with the user before proceeding with the cancellation
        if (confirm("Are you sure you want to cancel this booking?")) {
            // Send an AJAX request to delete the booking
            $.ajax({
                url: 'cancel_booking.php', // Specify the URL of the script to handle the cancellation
                type: 'POST',
                data: {booking_id: booking_id},
                success: function(response) {
                    // Handle the response, for example, display a message
                    alert("Booking canceled successfully!");
                    // Optionally, you can reload the page to reflect the changes
                    location.reload();
                },
                error: function(xhr, status, error) {
                    // Handle errors, for example, display an error message
                    alert("An error occurred while canceling the booking.");
                    console.error(error);
                }
            });
        }
    }

function viewPaymentDetails(buttonElement) {
    // Extract the booking_id from the button's data attribute
    var booking_id = $(buttonElement).attr('data-booking-id');
    console.log("Booking ID: ", booking_id); // Log it for verification

    // Proceed with the AJAX request
    $.ajax({
        url: 'payment_Details.php', // Adjust if necessary
        type: 'POST',
        data: { booking_id: booking_id },
        success: function(response) {
            // On success, load the response into the modal's body and show the modal
            $('#paymentDetailsModal .modal-body').html(response);
            $('#paymentDetailsModal').modal('show');
        },
        error: function(xhr, status, error) {
            // Log or handle error
            console.error("Error fetching payment details: ", error);
        }
    });
}
</script>

</body>
</html>
