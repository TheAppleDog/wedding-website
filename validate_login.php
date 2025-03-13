<?php
// validate_login.php
session_start(); // Start the session
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['User'];
    $password = $_POST['passw']; // Password entered by the user
   // var_dump($username, $password);

    // Database credentials
    $servername = "localhost";
    $db_username = "root";
    $db_password = "";
    $dbname = "wedding_planner";

    // Create connection
    $conn = new mysqli($servername, $db_username, $db_password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind
    $stmt = $conn->prepare("SELECT user_password FROM tblaccounts WHERE user_name = ?");
    $stmt->bind_param("s", $username);

    // Execute the statement
    $stmt->execute();

    // Bind result variables
    $stmt->bind_result($hashed_password);
    //var_dump($hashed_password);

    // Fetch value
    if ($stmt->fetch()) {
        // User exists, now verify the password
        if (password_verify($password, $hashed_password)) {
            // Password is correct, insert login record
           // var_dump(password_verify($password, $hashed_password)); // Debug password verification
            // Close the previous statement
            $stmt->close();

            // Prepare the insert statement
            $insert_sql = "INSERT INTO login (user_name, login_time) VALUES (?, NOW()) ON DUPLICATE KEY UPDATE login_time = VALUES(login_time)";
            $stmt = $conn->prepare($insert_sql);
            $stmt->bind_param("s", $username);

            if ($stmt->execute()) {
                $_SESSION['user_name'] = $username;
                echo "success";
            } else {
                echo "Error: " . $insert_sql . "<br>" . $conn->error;
            }
        } else {
            // Password does not match
            echo "Invalid password";
        }
    } else {
        // Username does not exist
        echo "Invalid username";
    }

} else {
    echo "Invalid request method";
}
?>
