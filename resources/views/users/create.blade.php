<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
</head>
<body>
    <h2>Create user</h2>

    {{-- form post về đúng route REST --}}
    <form action="{{ route('users.store') }}" method="POST">
        @csrf

        <label for="Name">
            Name:
            <input type="text" name="name" required>
        </label><br><br>

        <label for="Email">
            Email:
            <input type="email" name="email" required>
        </label><br><br>

        <label for="Password">
            Password:
            <input type="password" name="password" required>
        </label><br><br>
        @if(auth()->user()->role === 'super admin')
            <label for="Role">
                Role:
                <select name="role">
                    <option value="user">user</option>
                    <option value="admin">admin</option>
                    <option value="super admin">super admin</option>
                </select>
            </label><br><br>
        @endif

        <button type="submit">Create user</button>
    </form>
</body>
</html>
