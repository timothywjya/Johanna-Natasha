<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Johanna Natasha Agaatsz</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #F7CE5B;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .login-container {
            background-color: #FFFFFF;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }

        h2 {
            color: #8B4513;
            font-size: 24px;
            margin-bottom: 20px;
        }

        logo {
            margin-bottom: 20px;
        }

        .logo img {
            max-width: 100px;
            border-radius: 50%;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #8B4513;
            text-align: left;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 2px solid #FFA500;
            /* Oranye Tigger */
            border-radius: 6px;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            outline: none;
            border-color: #E53E3E;
        }

        button {
            background-color: #E53E3E;
            color: white;
            padding: 12px;
            width: 100%;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #C53030;
        }

        .footer {
            margin-top: 20px;
            color: #8B4513;
            font-size: 14px;
        }

        .footer a {
            color: #E53E3E;
            text-decoration: none;
        }

        @media (max-width: 768px) {
            .login-container {
                padding: 20px;
                max-width: 300px;
            }

            h2 {
                font-size: 20px;
            }

            button {
                padding: 10px;
                font-size: 14px;
            }
        }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="logo">
            <img src="{{ asset('images/Logo.png') }}" alt="Pooh Logo">
        </div>

        <h2>Welcome Back!</h2>
        <form action="{{ route('authenticate') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" maxlength="100" name="username" placeholder="Enter your username" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input maxlength="100" type="password" name="password" placeholder="Enter your password" required>
            </div>
            <button type="submit">Login</button>
        </form>

        <div class="footer">
            <p>Happy Birthday, Jo 💖</p>
        </div>
    </div>
</body>

</html>