<?php
// Start a session
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "iub360";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get email and password from the form
    $email = $_POST["email"];
    $password = $_POST["password"];

    // SQL query to check if the user exists
    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);

    // Check if the query was successful
    if ($result === false) {
        die("Error executing query: " . $conn->error);
    }

    // Check if a user was found
    if ($result->num_rows > 0) {
        // Fetch user data
        $row = $result->fetch_assoc();
        $userType = $row["user_type"];

        // Store user information in the session
        $_SESSION["user_id"] = $row["user_id"];
        $_SESSION["name"] = $row["name"];
        $_SESSION["email"] = $row["email"];
        $_SESSION["user_type"] = $userType;

        // Redirect based on user type
        switch ($userType) {
            case "student":
                header("Location: studentDashboard.php");
                break;
            case "mentor":
                // Add redirect for mentor
                header("Location: mentorDashboard.php");
                break;
            case "admin":
                // Add redirect for admin
                header("Location: adminDashboard.php");
                break;
            default:
                echo "Invalid user type.";
        }
    } else {
        echo "Invalid email or password. Please try again.";
    }
}

// Close the connection
$conn->close();
?>