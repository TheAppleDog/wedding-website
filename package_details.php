<?php
include 'admin/include/init.php';

if (isset($_GET['id'])) {
    $package_id = $_GET['id'];
    $category = Category::find_by_id($package_id);

    // Now, you can use $category to display the details of the selected package
} else {
    // Handle the case where no package ID is provided
    echo "Invalid request";
}
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Celestia Wedding Hub Bliss</title>
<script src="https://kit.fontawesome.com/741424920c.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-datepicker@1.9.0/dist/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.materialdesignicons.com/2.1.19/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="include/footer.css">
    <link rel="stylesheet" href="nav.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <style>
 .content-container {
            
            margin-right: 9.9%; /* Adjust as needed */
            font-family: Arial, sans-serif;
            display: flex;
            margin-left:9.9%;
        }
        .card {
            width: 40%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease-in-out;
            cursor: pointer;
        }

        .card2 {
            width: 60%;
            background-color:white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease-in-out;
            cursor: pointer;
        }

        .card-content {
            padding: 15px;
            font-size: 20px;
        }

        /* Add this style to fix image size */
        .card img {
            width: 100%;
            height: auto;
        }
.feature-table {
    width: 100%;
    border-collapse: collapse; /* Collapse borders */
  }
  
  .feature-table tr {
    border-bottom: 1px solid #d3d3d3; /* Add a bottom border to each row */
  }
  
  .feature-table td {
    padding: 10px; /* Add some padding inside cells */
  }

/* review-card */
.review-card {
    width: 200px;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    padding: 10px;
  
    display: inline-block;
    vertical-align: top;
    transition: transform 0.3s ease-in-out;
   cursor: grab;
  
        margin: 0 10px; /* Adjust as needed */
}
    .reviews-container {
        overflow-y: hidden; /* Hide vertical scrollbar */
        overflow-x: hidden; /* Hide horizontal scrollbar */
        flex-wrap: nowrap; /* Prevent line breaks */
    }
.review-card:hover {
    transform: scale(1.05);
}

.review-stars {
    color: #FFD700; /* gold */
}

    </style>
</head>
<body>

<?php include 'include/nav.php'; ?>
<br><br><br>

<div class="content-container">
        <?php if ($category) : ?>
            <div class="card">
                <div class="card-content">
                    <div>
                        <img src="admin/<?php echo $category->preview_image_picture(); ?>" alt="">
                    </div>
                </div>
            </div>&nbsp;&nbsp;
            <div class="card2">
                <div class="card-content">
                    <div>
                        <span class="card-title" style="font-weight: bold; text-transform: uppercase; padding-top:0;">
                            <?php echo $category->wedding_type; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <span style="font-weight: bold;">₹ <?php echo $category->price; ?></span>
                        </span>

<hr style="border-top: 1px solid black; margin: 5px 0;">
<!--<div class="list"><br>-->
 <!--<div class="c"><h5>THIS PACKAGE INCLUDES:</h5></div>-->
 <div class="list">
  <?php $features = Features::find_by_feature_no_limit($category->id); ?>
  <table class="feature-table">
    <?php foreach ($features as $feature_item) : ?>
      <tr>
        <td style="font-size:16px;"><img src="images/ring_check.png" style="height:25px; width:25px;"></img>&nbsp;&nbsp;<?= htmlspecialchars($feature_item->title); ?></td>
      </tr>
    <?php endforeach; ?>
  </table>
</div>
                    </div>
                </div>
            </div>
        <?php else : ?>
            <p>No details found for the specified package ID.</p>
        <?php endif; ?>
    </div>
<br><br><br>
<div class="content-container" style="margin-right:10%;">
    <!-- Static reviews -->
   <div class="reviews-container">
        <h3>Reviews</h3>
       <div class="reviews" id="reviews">
            <?php 
            // Static reviews for each package
            if ($package_id == 1) { // Adventure Trek
            echo '<div class="review-card">';
            echo '<div class="username">Rajesh Kumar</div>';
            echo '<div class="review-stars">★★★★★</div>';
            echo '<b><div class="type">' . $category->wedding_type . '</b></div>';
            echo '<div class="comment">💖 Incredible wedding planning journey! A must for couples seeking adventure! 🌟</div>';
            echo '</div>';

            echo '<div class="review-card">';
            echo '<div class="username">Pooja Patel</div>';
            echo '<div class="review-stars">★★★★☆</div>';
            echo '<b><div class="type">' . $category->wedding_type . '</b></div>';
            echo '<div class="comment">💖 Enjoyed every moment! Only wished it was longer! 😊</div>';
            echo '</div>';

            echo '<div class="review-card">';
            echo '<div class="username">Amit Sharma</div>';
            echo '<div class="review-stars">★★★★★</div>';
            echo '<b><div class="type">' . $category->wedding_type . '</b></div>';
            echo '<div class="comment">💖 Perfect planning for an adventurous wedding! Couldn\'t ask for more! 😎</div>';
            echo '</div>';
        } elseif ($package_id == 2) { // Golden Triangle Tour
            echo '<div class="review-card">';
            echo '<div class="username">Vikram Singh</div>';
            echo '<div class="review-stars">★★★★☆</div>';
            echo '<b><div class="type">' . $category->wedding_type . '</b></div>';
            echo '<div class="comment">💖 Unforgettable journey through wedding history! Highly recommended! 🌟</div>';
            echo '</div>';

            echo '<div class="review-card">';
            echo '<div class="username">Ananya Mishra</div>';
            echo '<div class="review-stars">★★★★★</div>';
           echo '<b><div class="type">' . $category->wedding_type . '</b></div>';
            echo '<div class="comment">💖 Seamless wedding planning and mesmerizing experiences! Highly recommended! 😍</div>';
            echo '</div>';

            echo '<div class="review-card">';
            echo '<div class="username">Rahul Sharma</div>';
            echo '<div class="review-stars">★★★★☆</div>';
            echo '<b><div class="type">' . $category->wedding_type . '</b></div>';
            echo '<div class="comment">💖 Wonderful experience exploring the vibrant wedding destinations! 👍</div>';
            echo '</div>';
        } elseif ($package_id == 3) { // Goa Beach Getaway
            echo '<div class="review-card">';
            echo '<div class="username">Amit Patel</div>';
            echo '<div class="review-stars">★★★★★</div>';
           echo '<b><div class="type">' . $category->wedding_type . '</b></div>';
            echo '<div class="comment">💖 Perfect beach wedding planning! Couldn\'t ask for a better relaxation spot! 😎</div>';
            echo '</div>';

            echo '<div class="review-card">';
            echo '<div class="username">Deepika Sharma</div>';
            echo '<div class="review-stars">★★★★☆</div>';
            echo '<b><div class="type">' . $category->wedding_type . '</b></div>';
            echo '<div class="comment">💖 Had a blast at the beach wedding! Wish I could stay longer! 🏄‍♀️</div>';
            echo '</div>';
        } elseif ($package_id == 4) { // Himalayan Retreat
            echo '<div class="review-card">';
            echo '<div class="username">Rohan Gupta</div>';
            echo '<div class="review-stars">★★★★☆</div>';
            echo '<b><div class="type">' . $category->wedding_type . '</b></div>';
            echo '<div class="comment">💖 Unforgettable wedding in the Himalayas! Incredible vistas and perfect planning! 🌟</div>';
            echo '</div>';

            echo '<div class="review-card">';
            echo '<div class="username">Anjali Singh</div>';
            echo '<div class="review-stars">★★★★★</div>';
            echo '<b><div class="type">' . $category->wedding_type . '</b></div>';
            echo '<div class="comment">💖 Magical wedding amidst snowfall and cozy accommodations! Pure bliss! ⛄</div>';
            echo '</div>';
        } elseif ($package_id == 5) { // Rajasthan Heritage Tour
    echo '<div class="review-card">';
    echo '<div class="username">Sandeep Verma</div>';
    echo '<div class="review-stars">★★★★★</div>';
    echo '<b><div class="type">' . $category->wedding_type . '</b></div>';
    echo '<div class="comment">💖 Rich heritage wedding experience! Royal treatment and stunning palaces made our day unforgettable! 👑</div>';
    echo '</div>';

    echo '<div class="review-card">';
    echo '<div class="username">Divya Singh</div>';
    echo '<div class="review-stars">★★★★☆</div>';
    echo '<b><div class="type">' . $category->wedding_type . '</b></div>';
    echo '<div class="comment">💖 Stunning wedding venues and delicious cuisine! Truly regal experience! 🌟</div>';
    echo '</div>';
} elseif ($package_id == 6) { // Kerala Backwater Cruise
    echo '<div class="review-card">';
    echo '<div class="username">Manoj Nair</div>';
    echo '<div class="review-stars">★★★★★</div>';
    echo '<b><div class="type">' . $category->wedding_type . '</b></div>';
    echo '<div class="comment">💖 Serene backwater wedding and lush greenery! A tranquil paradise for our special day! 🌴</div>';
    echo '</div>';

    echo '<div class="review-card">';
    echo '<div class="username">Neha Iyer</div>';
    echo '<div class="review-stars">★★★★☆</div>';
    echo '<b><div class="type">' . $category->wedding_type . '</b></div>';
    echo '<div class="comment">💖 Mesmerizing sunsets and authentic local experiences made our wedding journey memorable! 🌟</div>';
    echo '</div>';
}            ?>
        </div>
  </div>
</div>

<br><br><br>
<form action="validate_booking.php" method="post" onsubmit="return validateBookingForm()" style="background: white; margin-right: 10%; margin-left: 10%; padding: 20px;" >
    <?php if ($session->message()) : ?>
        <?php echo $session->message(); ?>
    <?php endif; ?>

    <h2 class="h5 text-center mb-3 m-0" style="font-weight:bold;"><img src="images/bride_groom3.png" style="width:70px; height:70px;" alt="couple"> WEDDING PLANNING STARTS HERE <img src="images/bride_groom3.png" style="width:70px; height:70px;" alt="couple"></h2>

    <!-- Additional Fields -->
 <div class="form-group">
        <input type="name" class="form-control" name="name" style="font-weight:bold;" placeholder="Registered username" required>
<span id="name-error" style="color: red; font-size: 12px; display: block;"></span>
           </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <input type="text" class="form-control" name="bride_name"  style="font-weight:bold;" placeholder="Bride's Name" required>
        </div>
        <div class="form-group col-md-6">
            <input type="text" class="form-control" name="groom_name"  style="font-weight:bold;" placeholder="Groom's Name" required>
        </div>
    </div>
<input type="hidden" name="package_id" value="<?php echo htmlspecialchars($package_id); ?>">

    <div class="form-group">
        <input type="email" class="form-control" name="couple_email"  style="font-weight:bold;" placeholder="Email Address" required>
<span id="couple_email-error" style="color: red; font-size: 12px; display: block;"></span>
           </div>

    <div class="form-group">
        <input type="phone" class="form-control" name="couple_phone"  style="font-weight:bold;" placeholder="Phone Number" required>
<span id="couple_phone-error" style="color: red; font-size: 12px; display: block;"></span>
          </div>

    <div class="form-group">
               <div class="input-group">
            <input type="text" class="form-control datepicker"  style="font-weight:bold;" name="wedding_date" placeholder="Select Wedding Date" required>
            <div class="input-group-append">
               
                <img src="images/calendar.png" style="width:60px; height:50px;" alt="Calendar">
            
        </div>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label for="wedding_venue"  style="font-weight:bold;">Wedding Venue:</label>
        <select class="form-control" name="wedding_venue"  style="font-weight:bold;" required>
           <option value="Udaipur">Udaipur, Rajasthan</option>
<option value="Jaipur">Jaipur, Rajasthan</option>
<option value="Jodhpur">Jodhpur, Rajasthan</option>
<option value="Jaisalmer">Jaisalmer, Rajasthan</option>
<option value="Goa">Goa</option>
<option value="Kerala">Kerala</option>
<option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
<option value="Mussoorie">Mussoorie, Uttarakhand</option>
<option value="Shimla">Shimla, Himachal Pradesh</option>
<option value="Rishikesh">Rishikesh, Uttarakhand</option>
<option value="Agra">Agra, Uttar Pradesh</option>
<option value="Hyderabad">Hyderabad, Telangana</option>
<option value="Bangalore">Bangalore, Karnataka</option>
<option value="Alibaug">Alibaug, Maharashtra</option>
<option value="Neemrana">Neemrana, Rajasthan</option>
<option value="Lavasa">Lavasa, Maharashtra</option>
<option value="Pushkar">Pushkar, Rajasthan</option>
<option value="Khajuraho">Khajuraho, Madhya Pradesh</option>
<option value="Mahabaleshwar">Mahabaleshwar, Maharashtra</option>
<option value="Coorg">Coorg, Karnataka</option>
<option value="Kumarakom">Kumarakom, Kerala</option>
<option value="Ujjain">Ujjain, Madhya Pradesh</option>
<option value="Ranakpur">Ranakpur, Rajasthan</option>
<option value="Hampi">Hampi, Karnataka</option>
<option value="Dalhousie">Dalhousie, Himachal Pradesh</option>
<option value="Munnar">Munnar, Kerala</option>
<option value="Orchha">Orchha, Madhya Pradesh</option>
<option value="Srinagar">Srinagar, Jammu & Kashmir</option>
<option value="Gulmarg">Gulmarg, Jammu & Kashmir</option>
<option value="Pondicherry">Pondicherry</option>
<option value="Kolkata">Kolkata, West Bengal</option>
<option value="Chennai">Chennai, Tamil Nadu</option>
<option value="Varanasi">Varanasi, Uttar Pradesh</option>
<option value="Mount Abu">Mount Abu, Rajasthan</option>
<option value="Rann of Kutch">Rann of Kutch, Gujarat</option>
<option value="Diu">Diu</option>
<option value="Bikaner">Bikaner, Rajasthan</option>
<option value="Alleppey">Alleppey, Kerala</option>
<option value="Shillong">Shillong, Meghalaya</option>
<option value="Madurai">Madurai, Tamil Nadu</option>
<option value="Lucknow">Lucknow, Uttar Pradesh</option>
<option value="Kochi">Kochi, Kerala</option>
<option value="Mumbai">Mumbai, Maharashtra</option>
            <!-- Add more venue options as needed -->
        </select>
    </div>

   <div class="form-group">
    <label for="add_ons"  style="font-weight:bold;">Add Ons (Maximum 3 events) (Optional to add):</label>
    <textarea name="events" class="form-control" style="font-weight:bold;" id="Inputdescription" rows="3" 
placeholder="Like: Father and Daughter dance
Groom's friends group dance
Bridesmaid's dance
Any games"></textarea>
                    </div>
</div>
</div>


    <div class="form-group">
        <label for="estimated_guests"  style="font-weight:bold;">Estimated Number of Guests:</label>
        <input type="number" class="form-control"  style="font-weight:bold;" name="estimated_guests" required>
                </div>
<div class="form-group">
    <p style="background-color: #f8f9fa; color: #333; font-weight: bold; padding: 15px; border-left: 5px solid #007bff; margin-top: 20px;">
    Note: Advance payment, either by cheque or demand draft, is a must to confirm booking. The location planning may need to be adjusted if a different state is selected, to accommodate available facilities and services. We will be in touch with you to discuss further details and plans once the booking has been confirmed.<br>No Refund if you cancelled booking.
</p>

</div>

  <div class="form-group">
    <label style="font-weight: bold;">
        <input type="checkbox" name="agree_to_terms" style="font-weight: bold; transform: scale(1.3);" required>&nbsp;I agree to the Terms and Conditions.
    </label>
</div>


    <div class="text-center mt-3">
           <button type="submit" name="book_now" class="btn btn-success btn-sm text-uppercase font-weight-bold" style="margin-top: -5px;">Book Now</button>
    </div>
</form><br><br><br><br>
<?php include 'include/footer.php'; ?>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-datepicker@1.9.0/dist/js/bootstrap-datepicker.min.js"></script>

<!-- Additional Script for Datepicker -->
<script>




   $(document).ready(function () {
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
            startDate: new Date() // Restrict date selection to dates from today onwards
        });
    });

    function validateBookingForm() {
        var coupleEmail = document.querySelector('[name="couple_email"]').value;
        var couplePhone = document.querySelector('[name="couple_phone"]').value;

        // Clear previous error messages
        document.getElementById('couple_email-error').innerText = "";
        document.getElementById('couple_phone-error').innerText = "";

        // Perform validation
        if (!isValidEmail(coupleEmail)) {
            // Display error message for invalid email
            document.getElementById('couple_email-error').innerText = "Please enter a valid email address";
            return false;
        }

        if (!isValidPhone(couplePhone)) {
            // Display error message for invalid phone number
            document.getElementById('couple_phone-error').innerText = "Phone number must be 10 digits";
            return false;
        }

        return true; // Allow form submission if validation passes
    }

    function isValidEmail(email) {
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }

    function isValidPhone(phone) {
        var phoneRegex = /^\d{10}$/;
        return phoneRegex.test(phone);
    }
</script>
</body>
</html>
