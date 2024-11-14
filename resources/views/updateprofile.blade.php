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
            <a href="home">Home</a>
            <a href="service">Service</a>
            <a href="updateprofile">Profile</a>
            <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit">Logout</button>
            </form>
        </div>
    </div>

    <div class="profile-section">
        <!-- Left box: Current user information -->
        <div class="current-info">
            <h2>Current Profile Information</h2>
            <img src="img/default.jpg" alt="Profile Image" class="profile-pic">
            <p><strong>Name:</strong> {{ $user->username }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
        </div>

        <!-- Right box: Edit profile form -->
        <div class="edit-profile-container">
            <h2>Edit Profile</h2>
            <form action="{{ route('update-profile') }}" method="post" enctype="multipart/form-data">
                @csrf
                <!-- Profile Image -->
                <label for="profile-image">Profile Image:</label>
                <input type="file" id="profileimage" name="profileimage" accept="image/*"><br>

                <!-- Name -->
                <label for="name">Name:</label>
                <input type="text" id="username" name="username" value="{{ $user->username }}" placeholder="Chnage your username"><br>

                <!-- Email -->
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="{{ $user->email }}" placeholder="Change your email"><br>

                <!-- Submit Button -->
                <button type="submit">Save Changes</button>
            </form>
        </div>
    </div>
</body>
<footer>
    <p>@2024 - Cyber Consultant</p>
</footer>
</html>
