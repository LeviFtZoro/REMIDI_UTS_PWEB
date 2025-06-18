<!DOCTYPE html>
<html>

<head>
    <title>Produk</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light m-0">
    <div class="d-flex" style="min-height: 100vh; margin: 0;">
        <!-- Sidebar -->
        @include('layouts.sidebar')

        <!-- Main Content -->
        <div class="flex-grow-1 p-4">
            <h1 class="mb-4">Daftar Produk</h1>

            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        @if(Auth::user()->role === 'user')
                            <th>Aksi</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                            <td>{{ $product->stock }}</td>
                            @if(Auth::user()->role === 'user')
                                <td>
                                    @if($product->stock > 0)
                                        <form method="POST" action="{{ route('products.buy', $product->id) }}">
                                            @csrf
                                            <button class="btn btn-success btn-sm">Beli</button>
                                        </form>
                                    @else
                                        <span class="text-danger">Stok habis</span>
                                    @endif
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
