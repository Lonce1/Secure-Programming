<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password Page</title>
    <link rel="stylesheet" href="css/forgotpassword.css">
</head>
<body>
    <div class="navbar">
        <h2 class="logo">Cyber Consultant</h2>
        <div class="option">
            <a href="home">Home</a>
            <a href="service">Service</a>
            <a href="">Blog</a>
            <button class="login-button">login</button>
        </div>
    </div>

    <div class="card">
        <div class="login">
            <h2>Forgot Password</h2>
            <form method="POST" action="{{ route('register') }">
                @csrf
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                    <input type="password" placeholder="New Password" require>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                    <input type="confirm-password" placeholder="Confirm New Password" require>
                </div>
                <button type="submit" class="btn">Change</button>
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