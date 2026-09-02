<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="p-4 container">
    <h2>Edit Data User</h2>
    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Nama:</label>
            <input type="text" name="name" value="{{ $user->name }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Email:</label>
            <input type="email" name="email" value="{{ $user->email }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Password Baru (Kosongkan jika tidak diganti):</label>
            <input type="password" name="password" class="form-control">
        </div>
        <div class="mb-3">
            <label>Role:</label>
            <select name="role_id" class="form-control" required>
                @foreach($roles as $r)
                    <option value="{{ $r->id }}" {{ $user->role_id == $r->id ? 'selected' : '' }}>
                        {{ $r->nama }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update Data</button>
        <a href="{{ route('users.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</body>
</html>