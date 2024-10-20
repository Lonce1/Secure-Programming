<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User-Profile Page</title>
    <link rel="stylesheet" href="css/updateprofile.css">
</head>
<body>
    <div class="navbar">
        <h2 class="logo">Cyber Consultant</h2>
        <div class="option">
            <a href="/home">Home</a>
            <a href="/service">Service</a>
            <a href="#">Blog</a>
            <button class="login-button">Login</button>
        </div>
    </div>

    <div class="profile-section">
        <div class="current-info">
            <h2>Current Profile Information</h2>
            <img src="img/default.jpg" alt="Profile Image" class="profile-pic">
            <p><strong>Name:</strong> {{ Auth::user()->username }}</p>
            <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
            <p><strong>Phone:</strong> {{ Auth::user()->phone_number }}</p>
        </div>

        <div class="edit-profile-container">
            <h2>Edit Profile</h2>
            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <label for="profile-image">Profile Image:</label>
                <input type="file" id="profile-image" name="profile-image" accept="image/*"><br>

                <label for="name">Name:</label>
                <input type="text" id="name" name="username" value="{{ old('username', Auth::user()->username) }}" placeholder="Enter your name"><br>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="{{ old('email', Auth::user()->email) }}" placeholder="Enter your email"><br>

                <label for="phone">Phone Number (starts with 8):</label>
                <input type="tel" id="phone" name="phone_number" value="{{ old('phone_number', substr(Auth::user()->phone_number, 3)) }}" placeholder="Enter your phone number"><br>

                <button type="submit">Save Changes</button>
            </form>
        </div>
    </div>
</body>
<footer>
    <p>@2024 - Cyber Consultant</p>
</footer>
</html>

