<?php
session_start();  // Start the session at the very top

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = substr($_POST['username'] ?? '', 0, 10);
    $password = $_POST['password'] ?? '';

    // Connect to MySQL
    $mysqli = new mysqli("127.0.0.1", "car_user", "car_pass", "carbooking");

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    // Query user
    $stmt = $mysqli->prepare("SELECT password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($hashedPassword);
        $stmt->fetch();

        if (password_verify($password, $hashedPassword)) {
            // ✅ Set session and redirect
            $_SESSION['username'] = $username;
            header("Location: dashboard.php");
            exit();
        } else {
            echo "Invalid credentials.";
        }
    } else {
        echo "User not found.";
    }

    $stmt->close();
    $mysqli->close();
}
?>
