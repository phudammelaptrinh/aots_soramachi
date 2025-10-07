<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
</head>

<body>
    <h2>Edit user</h2>

    {{-- form sửa user đúng RESTful --}}
    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PATCH')

        <label for="Name">
            Name:
            <input type="text" name="name" value="{{ $user->name }}" required>
        </label><br><br>

        <label for="Email">
            Email:
            <input type="email" name="email" value="{{ $user->email }}" required>
        </label><br><br>

        <label for="Password">
            Password:
            <input type="password" name="password" placeholder="Leave blank to keep old password">
        </label><br><br>

        @if(auth()->user()->role === 'super admin')
            <label for="Role">
                Role:
                <select name="role">
                    <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>user</option>
                    <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>admin</option>
                    <option value="super admin" {{ $user->role === 'super admin' ? 'selected' : '' }}>super admin</option>
                </select>
            </label><br><br>
        @endif

        <button type="submit">Edit user</button>
    </form>
</body>

</html>