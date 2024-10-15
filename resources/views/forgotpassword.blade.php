<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="/css/login.css">
</head>
<body>
    <div class="card">
        <div class="login">
            <h2>Forgot Password</h2>
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="input-box">
                    <span class="icon"><ion-icon name="mail-outline"></ion-icon></span>
                    <input type="email" name="email" placeholder="Enter your email" required>
                </div>
                <button type="submit" class="btn">Send Password Reset Link</button>
            </form>
        </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
<footer>
    <p>@2024 - Cyber Consultant</p>
</footer>
</html>
