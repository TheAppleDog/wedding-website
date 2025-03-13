<?php include 'include/init.php'; ?>
<?php
    if (!isset($_SESSION['id'])) { redirect_to("../"); }

    $booking_id = $_GET['booking'];
    $user_name = $_GET['user_name'];
    $booking =  Booking::getBooking();
    $accounts =  Accounts::find_by_user_id($user_name);
    $booking_detail =  Booking::find_by_booking_id($booking_id);
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

            /* Commented out Twilio SMS notification
            require __DIR__ . '/twilio-php-main/src/Twilio/autoload.php';
            $sid = 'ACb92f8f0a4e2cc5be1db9dc70ca5785dd';
            $token = '7d242fde7f5af02726a7ce738b76e231';
            $twilio_number = '+19164093900';
            $client = new Twilio\Rest\Client($sid, $token);
            $client->messages->create(
                '+91' . $booking_detail->phone,
                [
                    'from' => $twilio_number,
                    'body' => "Hello $booking_detail->user_name! 🎉 Your wedding booking is confirmed for $booking_detail->bride and $booking_detail->groom!"
                ]
            );
            */
             
            redirect_to("client.php");
        }
    }

    if (isset($_POST['cancel'])) {
        if ($booking_detail) {
            $status = "Cancelled";
            $booking_detail->status = $status;
            $booking_detail->update_booking($booking_id);
            $booking_detail->save_booking();   

            /* Commented out Twilio SMS notification
            require __DIR__ . '/twilio-php-main/src/Twilio/autoload.php';
            $client->messages->create(
                '+91' . $booking_detail->phone,
                [
                    'from' => $twilio_number,
                    'body' => "Hello $booking_detail->user_name! ❗ Your wedding booking has been cancelled."
                ]
            );
            */
            
            redirect_to("client.php");
        }
    }
?>
