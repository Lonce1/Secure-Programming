<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="/css/admin.css">
</head>
<body>
    <h1>Admin Dashboard</h1>
    <form action="{{ route('logout') }}" method="POST" style="display:inline;">
        @csrf
        <button type="submit">Logout</button>
    </form>
    <a href="{{ route('admin.create') }}">Add New Item</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Email</th>
            <th>Username</th>
            <th>Password</th>
            <th>Role</th>
            <th>Actions</th>
        </tr>
        @foreach($items as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->email }}</td>
            <td>{{ $item->username }}</td>
            <td>{{ $item->password }}</td>
            <td>{{ $item->role }}</td>
            <td>
                <a href="{{ route('admin.edit', $item->id) }}">Edit</a>
                <form action="{{ route('admin.delete', $item->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>
