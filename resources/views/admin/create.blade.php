<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Item</title>
    <link rel="stylesheet" href="/css/admin.css">
</head>
<body>
    <h1>Create New Item</h1>
    <form action="{{ route('admin.store') }}" method="POST">
        @csrf
        <label for="email">email:</label>
        <input type="text" id="email" name="email">
        <label for="username">username:</label>
        <input type="text" id="username" name="username">
        <label for="password">password:</label>
        <input type="text" id="password" name="password">
        <label for="role">Role:</label>
        <select id="role" name="role" required>
            <option value="user">User</option>
            <option value="admin">Admin</option>
        </select>
        <button type="submit">Create</button>
    </form>
</body>
</html>
