<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Template</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333333;
        }

        p {
            color: #666666;
        }

        .code {
            display: inline-block;
            padding: 10px;
            background-color: #3498db;
            color: #ffffff;
            font-size: 24px;
            font-weight: bold;
            border-radius: 4px;
        }

        footer {
            margin-top: 20px;
            text-align: center;
            color: #999999;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Email Verification</h1>
        <p>Dear User,</p>
        <p>Your verification code is:</p>
        <div class="code">{{$code}}</div>
        <p>Please use this code to verify your email address.</p>
        <footer>
            <p>If you didn't request this code, please ignore this email.</p>
            <p>&copy; 2024 {{config('app.name')}}</p>
        </footer>
    </div>
</body>

</html>