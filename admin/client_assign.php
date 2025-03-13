<?php include 'include/init.php'; ?>
<?php
    if (!isset($_SESSION['id'])) { redirect_to("../"); }

    $booking_id = $_GET['booking'];
    $user_name = $_GET['user_name'];
    $booking = Booking::getBooking();
    $accounts = Accounts::find_by_user_id($user_name);
    $booking_detail = Booking::find_by_booking_id($booking_id);
    $categories = Category::find_all();

    if (isset($_POST['confirm'])) {
        if ($booking_detail) {
            $username = clean($_POST['username']);
            $email = clean($_POST['email']);
            $wedding_date = clean($_POST['wedding_date']);
            $bride = clean($_POST['bride']);
            $groom = clean($_POST['groom']);
            $phone = clean($_POST['phone']);
            $city = clean($_POST['city']);
            $wedding_type = clean($_POST['wedding_type']);
            $organizer_id = clean($_POST['organizer_id']);
            $description = clean($_POST['description']);
            $expectation_visitor = clean($_POST['expectation_visitor']);
            $cash_advance = clean($_POST['cash_advanced']);
            $status = "Confirm";

            $booking_detail->bride = $bride;
            $booking_detail->groom = $groom;
            $booking_detail->wedding_type = $wedding_type;
            $booking_detail->email = $email;
            $booking_detail->wedding_date = $wedding_date;
            $booking_detail->organizer_id = $organizer_id;
            $booking_detail->status = $status;
            $booking_detail->wedding_venue = $city;
            $booking_detail->est_guest = $expectation_visitor;
            $booking_detail->cash_advance = $cash_advance;
            $booking_detail->Events = $description;

            $booking_detail->update_booking($booking_id);
            $booking_detail->save_booking();       

            if ($booking_detail->save_booking()) {
                $accounts->save_account();
            }

            redirect_to("client.php");

            $session->message("
            <div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">
              <strong><i class='mdi mdi-approval'></i></strong> {$booking_detail->user_name} has been successfully modified.
              <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                <span aria-hidden=\"true\">&times;</span>
              </button>
            </div>");
        }
    }

    if (isset($_POST['cancel'])) {
        if ($booking_detail) {
            $status = "Cancelled";
            $booking_detail->status = $status;
            $booking_detail->update_booking($booking_id);
            $booking_detail->save_booking();   

            if ($booking_detail->save_booking()) {
                $accounts->save_account();
            }
            redirect_to("client.php");

            $session->message("
            <div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">
              <strong><i class='mdi mdi-approval'></i></strong> {$booking_detail->user_name} has been successfully updated.
              <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                <span aria-hidden=\"true\">&times;</span>
              </button>
            </div>");
        }
    }

    if (isset($_POST['fraud'])) {
        if ($booking_detail) {
            $status = "Fraud";
            $booking_detail->status = $status;
            $booking_detail->update_booking($booking_id);
            $booking_detail->save_booking();  

            if ($booking_detail->save_booking()) {
                $accounts->save_account();
            }
            redirect_to("client.php");

            $session->message("
            <div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">
              <strong><i class='mdi mdi-approval'></i></strong> {$booking_detail->user_name} has been successfully updated.
              <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                <span aria-hidden=\"true\">&times;</span>
              </button>
            </div>");
        }
    }
?>

<?php $users_profile = Users::find_by_id($_SESSION['id']); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Edit Client Information - Administrator</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/dashboard.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.materialdesignicons.com/2.1.19/css/materialdesignicons.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="../css/bootstrap-datepicker.css">
    <style>
        body {
            margin-bottom: 2%;
        }
        .box-shadow {
            box-shadow: 0 0 2px 1px rgba(0, 0, 0, 0.3);
            font-size: 12px;
        }
        .form-control {
            font-size: 12px;
        }
        .datepicker {
            font-size: 12px;
        }
    </style>
</head>
<body>

<?php include_once 'include/sidebar.php'; ?>
<div class="container">
    <div class="row">
        <div class="col-lg-8 offset-2 pl-3 pb-3 box-shadow mt-4">
            <form method="post" action="">
                <h4 class="h4 mt-4 pb-2" style="border-bottom: 1px solid #dee2e6!important;">Client Information
                    <a href="client.php" class="btn btn-sm btn-light float-right mr-2 active" style="font-size: 12px;">
                        <span class="mdi mdi-arrow-left"></span> Back 
                    </a>
                </h4>
                
                <!-- Client Form Fields Here -->
                
                <button type="submit" name="cancel" class="btn btn-sm btn-secondary float-right mr-2" style="font-size: 12px;">
                    <i class="mdi mdi-cancel mr-2"></i> Cancel Booking
                </button>
                <button type="submit" name="fraud" class="btn btn-sm btn-danger float-right mr-2" style="font-size: 12px;">
                    <i class="mdi mdi-linux mr-2"></i> Fraud Booking
                </button>
                <button type="submit" name="confirm" class="btn btn-sm btn-primary float-right mr-2" style="font-size: 12px;">
                    <i class="mdi mdi-check mr-2"></i> Confirm Booking
                </button>
            </form>  
        </div>
    </div>
</div>

<script src="js/jquery-3.2.1.slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="../js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="../js/bootstrap-datepicker.min.js"></script>
<script>
    $(document).ready(function() {
        $('#wedding_date').datepicker();
    });
</script>
</body>
</html>
