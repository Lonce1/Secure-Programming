<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Item</title>
    <link rel="stylesheet" href="/css/admin.css">
</head>
<body>
    <h1>Edit Item</h1>
    <form action="{{ route('admin.update', $item->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="username">username:</label>
        <input type="text" id="username" name="username" value="{{ $item->username }}">
        <button type="submit">Update</button>
    </form>
</body>
</html>
