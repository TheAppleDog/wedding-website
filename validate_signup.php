<?php
// validate_signup.php
session_start(); // Start the session
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $usernames = $_POST['user'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password for security

    // Perform server-side validation
    $errors = [];

    // Example: Check if email and phone are 10 digits, password requirements, etc.
    $phoneRegex = '/^\d{10}$/';
    $passwordRegex = '/^(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])/';

    if (!preg_match($phoneRegex, $phone)) {
        $errors['phone'] = "Phone number must be 10 digits";
    }

    if (!preg_match($passwordRegex, $_POST['password'])) {
        $errors['password'] = "Password must have at least 1 capital letter, 1 special character, and 1 numeric";
    }
// Perform email validation
if (!filter_var($email, FILTER_VALIDATE_EMAIL) || !preg_match('/@.*\.[a-zA-Z]{2,}$/', $email)) {
    $errors['email'] = "Invalid email format";
}

    // Check if username already exists
    $servername = "localhost";
    $db_username = "root";
    $db_password = "";
    $dbname = "wedding_planner";

    $conn = new mysqli($servername, $db_username, $db_password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $check_username_sql = "SELECT * FROM tblaccounts WHERE user_name = '$usernames'";
    $result = $conn->query($check_username_sql);

    if ($result->num_rows > 0) {
        $errors['username'] = "Username already exists";
    }

    $conn->close();

    if (empty($errors)) {
        // Validation successful, insert data into the database
        $conn = new mysqli($servername, $db_username, $db_password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Insert data into the 'users' table
        $insert_sql = "INSERT INTO tblaccounts (user_name, user_email, user_phone, user_password) VALUES ('$usernames', '$email', '$phone', '$password')";

        if ($conn->query($insert_sql) === TRUE) {
             $_SESSION['user_name'] = $usernames;
            echo "success"; // Return success to the client
        } else {
            echo "Error: " . $insert_sql . "<br>" . $conn->error;
        }

        $conn->close();
    } else {
        // Return validation errors to the client
        echo json_encode($errors);
    }
} else {
    echo "Invalid request method";
}
?>
