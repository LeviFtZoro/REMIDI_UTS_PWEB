<div class="bg-secondary text-white p-4 d-flex flex-column justify-content-between" style="min-height: 100vh; width: 250px;">
  <!-- Menu Atas -->
  <div>
    <h2 class="h5 fw-bold mb-4">Menu</h2>

    @if(auth()->user()->role === 'admin')
      <ul class="nav flex-column">
        <li class="nav-item mb-2">
          <a href="{{ route('admin.products.index') }}"
             class="nav-link text-white ps-3 {{ request()->routeIs('admin.products.index') ? 'bg-dark rounded' : '' }}">
            Kelola Produk
          </a>
        </li>
        <li class="nav-item mb-2">
          <a href="{{ route('admin.products.create') }}"
             class="nav-link text-white ps-3 {{ request()->routeIs('admin.products.create') ? 'bg-dark rounded' : '' }}">
            Tambah Produk
          </a>
        </li>
      </ul>

    @elseif(auth()->user()->role === 'user')
      <ul class="nav flex-column">
        <li class="nav-item mb-2">
          <a href="{{ route('user.products.index') }}"
             class="nav-link text-white ps-3 {{ request()->routeIs('user.products.index') ? 'bg-dark rounded' : '' }}">
            Lihat Produk
          </a>
        </li>
      </ul>
    @endif
  </div>

  <!-- Tombol Logout -->
  <form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit" class="btn btn-danger w-100">Logout</button>
  </form>
</div>
