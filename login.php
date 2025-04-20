<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - Cardiology Risk Predictor</title>
    <!-- Include Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(to bottom right, #e3f2fd, #bbdefb);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-box {
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 8px 24px rgba(0,0,0,0.1);
            width: 350px;
            text-align: center;
            box-sizing: border-box;
        }

        h2 {
            color: #0d47a1;
            margin-bottom: 20px;
        }

        input {
            width: 100%;
            padding: 12px;
            margin: 12px 0;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box; /* Prevent box expansion */
        }

        .btn {
            width: 100%;
            padding: 12px;
            background-color: #0d47a1;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 1em;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #1565c0;
        }

        .switch {
            margin-top: 15px;
            text-align: center;
        }

        .switch a {
            color: #0d47a1;
            text-decoration: none;
        }

        .password-container {
            position: relative;
            width: 100%;
        }

        .password-container input {
            padding-right: 35px; /* Space for the icon */
        }

        .show-password-icon {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            font-size: 1.2em;
            color: #0d47a1;
        }

    </style>
</head>
<body>
<div class="login-box">
    <h2>Login</h2>
    <form action="login_process.php" method="POST">
        <input type="text" name="login_input" placeholder="Email or Phone Number" required />
        
        <!-- Password input with show/hide icon -->
        <div class="password-container">
            <input type="password" id="password" name="password" placeholder="Password" required />
            <span class="show-password-icon" id="showPasswordIcon">
                <i class="fas fa-eye"></i> <!-- Eye icon for show password -->
            </span>
        </div>
        
        <button class="btn" type="submit">Login</button>
    </form>
    <div class="switch">
        Don't have an account? <a href="register.php">Register here</a>
    </div>
</div>

<script>
    // Toggle password visibility
    const passwordInput = document.getElementById('password');
    const showPasswordIcon = document.getElementById('showPasswordIcon');

    showPasswordIcon.addEventListener('click', function() {
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text'; // Show password
            showPasswordIcon.innerHTML = '<i class="fas fa-eye-slash"></i>'; // Eye-slash icon for hide password
        } else {
            passwordInput.type = 'password'; // Hide password
            showPasswordIcon.innerHTML = '<i class="fas fa-eye"></i>'; // Eye icon for show password
        }
    });
</script>

</body>
</html>
