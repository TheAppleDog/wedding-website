<?php
// validate_booking.php
include 'admin/include/init.php';

// Database connection parameters
$servername = "localhost";
$dbUsername = "root";  // Ensure these are correct and have necessary permissions
$dbPassword = "";
$dbname = "wedding_planner";

// Establish database connection
$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve form data
    $package_id = $_POST['package_id'];
    $userName = $_POST['name'];
    $brideName = $_POST['bride_name'];
    $groomName = $_POST['groom_name'];
    $coupleEmail = $_POST['couple_email'];
    $couplePhone = $_POST['couple_phone'];
    $weddingDate = $_POST['wedding_date'];
    $weddingVenue = $_POST['wedding_venue'];
    $events = $_POST['events'];
    $estimatedGuests = $_POST['estimated_guests'];

    // Fetch wedding_type using the package_id from POST
    $category = Category::find_by_id($package_id);
    if (!$category) {
        echo "Invalid package ID";
        exit; // Stop script execution if the category is not found
    }
    $weddingType = $category->wedding_type;  // Assuming your object has a wedding_type property

    // Server-side validation (simplified for brevity)
    $errors = [];
    if (!preg_match('/^\S+@\S+\.\S+$/', $coupleEmail)) {
        $errors['email'] = "Please enter a valid email address";
    }
    if (!preg_match('/^\d{10}$/', $couplePhone)) {
        $errors['phone'] = "Phone number must be 10 digits";
    }

    // Insert data if there are no errors
    if (empty($errors)) {
        $stmt = $conn->prepare("INSERT INTO tblweddingcustomers (user_name, bride, groom, wedding_type, email, phone, wedding_date, wedding_venue, Events, est_guest) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssssssi", $userName, $brideName, $groomName, $weddingType, $coupleEmail, $couplePhone, $weddingDate, $weddingVenue, $events, $estimatedGuests);


        if ($stmt->execute()) {
            header("Location: thank_you.php");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo json_encode($errors);
    }

    $conn->close();
} else {
    echo "Invalid request method";
}
?>
