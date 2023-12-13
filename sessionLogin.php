<?php
session_start();

include "connection.php";

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result === false) {
        die("Error executing query: " . $conn->error);
    }

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $userType = $row["user_type"];

        $_SESSION["user_id"] = $row["user_id"];
        $_SESSION["name"] = $row["name"];
        $_SESSION["email"] = $row["email"];
        $_SESSION["user_type"] = $userType;

        switch ($userType) {
            case "student":
                header("Location: studentDashboard.php");
                break;
            case "mentor":
                header("Location: mentorDashboard.php");
                break;
            case "admin":
                header("Location: adminDashboard.php");
                break;
            default:
                echo "Invalid user type.";
        }
    } else {
        echo '<script>alert("Invalid email or password. Please try again."); window.location.href = "login.php";</script>';
    }
}

$conn->close();
?>