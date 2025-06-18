<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dashboard Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container py-5">
    <div class="card shadow">
      <div class="card-body">
        <h3 class="card-title">Selamat Datang, Admin {{ Auth::user()->name }}</h3>
        <p class="card-text">Ini adalah halaman dashboard untuk admin.</p>
        <a href="{{ route('logout') }}" 
           class="btn btn-danger"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          Logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
      </div>
    </div>
  </div>
</body>
</html>
