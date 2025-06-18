<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Produk</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="d-flex" style="min-height: 100vh;">
    <!-- Sidebar -->
    @include('layouts.sidebar')

    <!-- Main Content -->
    <div class="flex-grow-1 p-4">
      <h2 class="mb-4">Edit Produk</h2>

      <form method="POST" action="{{ route('admin.products.update', $product->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
          <label for="name" class="form-label">Nama Produk</label>
          <input type="text" id="name" name="name" value="{{ old('name', $product->name) }}" class="form-control" required>
        </div>

        <div class="mb-3">
          <label for="description" class="form-label">Deskripsi</label>
          <textarea id="description" name="description" class="form-control">{{ old('description', $product->description) }}</textarea>
        </div>

        <div class="mb-3">
          <label for="price" class="form-label">Harga</label>
          <input type="number" id="price" name="price" value="{{ old('price', $product->price) }}" class="form-control" required>
        </div>

        <div class="mb-3">
          <label for="stock" class="form-label">Stok</label>
          <input type="number" id="stock" name="stock" value="{{ old('stock', $product->stock) }}" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary ms-2">Kembali</a>
      </form>
    </div>
  </div>
</body>
</html>
