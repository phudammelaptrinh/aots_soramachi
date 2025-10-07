<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Users</title>
</head>

<body>
    <h2>List users</h2>

    {{-- Nút tạo user --}}
    @can('create-user')
        <a href="{{ route('users.create') }}">Create new user</a>
    @endcan
    <hr>

    {{-- Bảng danh sách --}}
    <table border="1" cellspacing="0" cellpadding="6">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>

        @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                   
                    @can('edit-user', $user)
                        <a href="{{ route('users.edit', $user->id) }}">Update</a>
                    @endcan

                  
                    @can('delete-user')
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Delete this user?')">Delete</button>
                        </form>
                    @endcan
                </td>
            </tr>
        @endforeach
    </table>
</body>

</html>