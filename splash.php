<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cardiology Risk Predictor</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(to bottom right, #e3f2fd, #bbdefb);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background: linear-gradient(to bottom, #ffffff, #f0f4ff);
            padding: 60px 30px;
            border-radius: 16px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 350px;
            height: 520px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .logo {
            width: 150px;
            height: 150px;
            margin: 0 auto 20px;
        }

        h1 {
            color: #0d47a1;
            font-size: 1.6em;
            margin-bottom: 15px;
        }

        p {
            font-size: 1em;
            color: #333;
            line-height: 1.6;
            padding: 0 10px;
        }

        .btn {
            margin-top: 35px;
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
    <div class="container">
        <img src="logo/logo.png" alt="Logo" class="logo">
        <h1>Cardiology Risk Predictor</h1>
        <p>
            Welcome to our platform that helps you identify your heart health risks.
            Input your health data and receive real-time insights to know about your heart health.
        </p>
        <a class="btn" href="login.php">Login / Register</a>
    </div>
</body>
</html>
