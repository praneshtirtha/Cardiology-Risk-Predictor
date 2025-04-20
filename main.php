<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect to login if not logged in
    exit();
}

// Get the user's name from session
$user_name = $_SESSION['name'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome - Cardiology Risk Predictor</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(to bottom right, #e3f2fd, #bbdefb);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .welcome-box {
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

        .timer {
            font-size: 1.5em;
            color: #0d47a1;
        }
    </style>
</head>
<body>

<div class="welcome-box">
    <h2>Welcome, <?php echo $user_name; ?>!</h2>
    <p>Welcome to the Cardiology Risk Predictor. You are successfully logged in.</p>
    <p>Please wait for <span id="timer" class="timer">3</span> seconds before proceeding to the health input interface.</p>
    <a href="input.php" class="btn" id="redirectBtn" style="display: none;">Proceed to Health Input</a>
</div>

<script>
// JavaScript to handle the countdown and redirection
let countdown = 3;
const timerElement = document.getElementById('timer');
const redirectButton = document.getElementById('redirectBtn');

const countdownInterval = setInterval(function() {
    countdown--;
    timerElement.innerText = countdown;

    if (countdown === 0) {
        clearInterval(countdownInterval);
        redirectButton.style.display = 'inline-block'; // Show the redirect button
        setTimeout(function() {
            window.location.href = "input.php"; // Redirect to input.php after 3 seconds
        }, 500); // Small delay before actual redirection
    }
}, 1000); // Update every second
</script>

</body>
</html>
