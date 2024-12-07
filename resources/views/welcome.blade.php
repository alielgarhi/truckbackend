<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Truck Ordering App</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background-color: #f4f4f9;
            color: #333;
        }

        .container {
            text-align: center;
            padding: 40px 20px;
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 10px 15px rgba(0,0,0,0.1);
            max-width: 500px;
            width: 100%;
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            0% { opacity: 0; transform: translateY(-20px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        h1 {
            font-size: 2.5rem;
            color: #007bff;
            margin-bottom: 20px;
        }

        p {
            font-size: 1.2rem;
            margin-bottom: 20px;
            color: #555;
        }

        .buttons {
            display: flex;
            justify-content: center;
            gap: 15px;
        }

        a {
            display: inline-block;
            padding: 12px 30px;
            font-size: 1rem;
            color: #fff;
            background-color: #007bff;
            text-decoration: none;
            border-radius: 8px;
            transition: all 0.3s ease-in-out;
            font-weight: bold;
            text-transform: uppercase;
        }

        a:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
        }

        .login-btn {
            background-color: #28a745;
        }

        .login-btn:hover {
            background-color: #218838;
        }

        .footer {
            margin-top: 30px;
            font-size: 0.9rem;
            color: #666;
        }

        .footer p {
            margin-top: 10px;
        }

        .footer a {
            color: #007bff;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }

        @media (max-width: 600px) {
            h1 {
                font-size: 2rem;
            }

            p {
                font-size: 1rem;
            }

            a {
                font-size: 0.9rem;
                padding: 10px 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to the Truck Ordering App</h1>
        <p>Manage your logistics efficiently and hassle-free with our secure platform.</p>
        
        <div class="buttons">
            <a href="/admin" class="admin-btn">Admin Panel</a>
            <a href="/login" class="login-btn">Login</a>
        </div>

        <footer class="footer">
            <p>Truck Ordering App © {{ date('Y') }}</p>
            <p>Need help? <a href="/support">Contact Support</a></p>
        </footer>
    </div>
</body>
</html>
