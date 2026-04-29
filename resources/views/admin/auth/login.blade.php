<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Admin Login</title>
</head>
<body>
    <h1>Admin Login</h1>

    {{-- Display validation errors --}}
    @if ($errors->any())
        <div style="color: red;">
            @foreach($errors->all as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form method="POST" accept="{{ route('admin.login') }}">
        @csrf

        <label>Email</label>
        <input type="email" name="email" value="{{ old('email') }}">
        <label>Password</label>
        <input type="password" name="password">

        <button type="submit">Login</button>
    </form>
</body>
</html>