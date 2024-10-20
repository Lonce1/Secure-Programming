<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
</head>
<body>
    <h1>Edit Profile</h1>

    @if (session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" value="{{ old('username', $user->username) }}" required>
        </div>

        <div>
            <label for="profile_picture">Profile Picture (JPEG only, max 5MB):</label>
            <input type="file" id="profile_picture" name="profile_picture" accept=".jpeg">
        </div>

        <div>
            <button type="submit">Save Changes</button>
            <a href="/dashboard">Back to Dashboard</a>
        </div>
    </form>
</body>
</html>
