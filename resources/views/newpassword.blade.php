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
            <p>Enter your email, and we'll send you instructions to reset your password. Follow the link in the email to create a new, secure password and regain access to your account.</p>
            <form method="POST" action="{{ route('reset.password.post') }}">
                @csrf
                <input type="text" name="token" hidden value="{{$token}}">
                <div class="input-box">
                    <span class="icon"><ion-icon name="mail-outline"></ion-icon></span>
                    <input type="email" name="email" placeholder="Email">
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="mail-outline"></ion-icon></span>
                    <input type="password" name="password" placeholder="Password">
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="mail-outline"></ion-icon></span>
                    <input type="password" name="password_confirmation" placeholder="Confirm Password">
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