<?php
session_start();
include 'db_connection.php';

$login_input = $_POST['login_input'];
$password = $_POST['password'];

// Check if the input is an email or phone number
if (filter_var($login_input, FILTER_VALIDATE_EMAIL)) {
    // It's an email, search by email
    $sql = "SELECT * FROM users WHERE email = ?";
} else {
    // It's a phone number, search by phone number
    $sql = "SELECT * FROM users WHERE phone_number = ?";
}

$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $login_input);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();
    if (password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['name'] = $user['name'];
        header("Location: main.php"); // Redirect to the dashboard or health input page
        exit();
    } else {
        echo "Incorrect password.";
    }
} else {
    echo "No user found with that email or phone number.";
}

$stmt->close();
$conn->close();
?>
