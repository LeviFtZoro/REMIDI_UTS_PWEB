<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="{{ asset('js/custom.js') }}"></script>
</head>
<body class="bg-light">
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-4">
        <h4 class="text-center">Login</h4>

        @if (session('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif

        @error('email')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <form method="POST" action="/login">
          @csrf
          <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required value="{{ old('email') }}">
          </div>
          <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" id="password" class="form-control" required>
          </div>
          <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" id="showPassword">
            <label class="form-check-label" for="showPassword">Tampilkan Password</label>
          </div>
          <button class="btn btn-primary w-100">Login</button>
          <div class="text-center mt-3">
            <a href="{{ route('register.form') }}" class="btn btn-sm">Belum punya akun? Daftar</a>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>