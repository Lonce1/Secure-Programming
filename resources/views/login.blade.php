<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
    <link rel="stylesheet" href="css/login.css">
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
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <h2>Login</h2>
            <form method="POST" action="/login">
                @csrf
                <div class="input-box">
                    <span class="icon"><ion-icon name="mail-outline"></ion-icon></span>
                    <input type="email" name="email" placeholder="Email">
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                    <input type="password" name="password" placeholder="Password">
                </div>
                <div class="forgot">
                    <a href="#">Forgot Password?</a>
                </div>
                <button name="submit" type="submit" class="btn">Login</button>
                <div class="login-register">
                    <p>Don't have an account? <a href="#" class="register-link">Register</a></p>
                </div>
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