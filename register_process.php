<?php
include 'db_connection.php';

// Get form data
$name = $_POST['name'];
$login_input = $_POST['login_input']; // Can be email or phone number
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

// Determine if the input is an email or phone number
if (filter_var($login_input, FILTER_VALIDATE_EMAIL)) {
    // It's an email, insert it into the email field
    $sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
} else {
    // It's a phone number, insert it into the phone_number field
    $sql = "INSERT INTO users (name, phone_number, password) VALUES (?, ?, ?)";
}

$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $name, $login_input, $password);

if ($stmt->execute()) {
    // Registration successful, show message and redirect
    echo "<!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <title>Registration Successful</title>
        <style>
            body {
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                background: linear-gradient(to bottom right, #e3f2fd, #bbdefb);
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
            }
            .message-box {
                background: white;
                padding: 40px;
                border-radius: 10px;
                box-shadow: 0 8px 24px rgba(0,0,0,0.1);
                width: 350px;
                text-align: center;
            }
            h2 {
                color: #0d47a1;
            }
            p {
                color: #333;
                font-size: 1.2em;
                margin-bottom: 20px;
            }
            .btn {
                background-color: #0d47a1;
                color: white;
                padding: 12px 25px;
                border: none;
                border-radius: 6px;
                font-size: 1em;
                cursor: pointer;
                text-decoration: none;
            }
            .btn:hover {
                background-color: #1565c0;
            }
        </style>
    </head>
    <body>
    <div class='message-box'>
        <h2>Registration Successful!</h2>
        <p>Thank you for registering. You will be redirected to the login page shortly.</p>
        <a href='login.php' class='btn'>Go to Login</a>
    </div>

    <script>
        // Redirect after 3 seconds
        setTimeout(function() {
            window.location.href = 'login.php'; // Redirect to login page
        }, 3000); // 3 seconds
    </script>
    </body>
    </html>";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
