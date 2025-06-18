<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Register</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-4">
      <h4 class="text-center">Register</h4>
      <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="mb-3">
          <label>Nama</label>
          <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
        </div>
        <div class="mb-3">
          <label>Email</label>
          <input type="email" name="email" class="form-control" required value="{{ old('email') }}">
        </div>
        <div class="mb-3">
          <label>Password</label>
          <input type="password" name="password" class="form-control" required>
        </div>
        <div class="mb-3">
          <label>Konfirmasi Password</label>
          <input type="password" name="password_confirmation" class="form-control" required>
        </div>
        @error('email')
          <div class="text-danger">{{ $message }}</div>
        @enderror
        <button class="btn btn-primary w-100">Daftar</button>
        <div class="text-center mt-3">
          <a href="{{ route('login') }}" class="btn btn-sm">Sudah punya akun? Login</a>
        </div>
      </form>
    </div>
  </div>
</div>
</body>
</html>
