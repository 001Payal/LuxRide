<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $raw_username = $_POST['username'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // PHP thinks this is a unique user
    if (trim($raw_username) === 'admin') {
        // Legitimate "admin" is not allowed to be registered
        die("Username already exists.");
    }

    // Connect to MySQL
    $mysqli = new mysqli("127.0.0.1", "car_user", "car_pass", "carbooking");

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    // This will truncate long input in MySQL (e.g., 'admin.....') to 'admin'
    $stmt = $mysqli->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)
        ON DUPLICATE KEY UPDATE email = VALUES(email), password = VALUES(password)");
    $stmt->bind_param("sss", $raw_username, $email, $password);

    if ($stmt->execute()) {
    echo "Registered or updated! Redirecting to dashboard...";
    echo '<meta http-equiv="refresh" content="2;url=dashboard.php">';
    }else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $mysqli->close();
}
?>
