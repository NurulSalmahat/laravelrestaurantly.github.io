<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="index.html">RESTAURANTLY</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
          <a href="index.html"></a>
      </div>
      <ul class="sidebar-menu">
        <li><a class="nav-link" href="{{ Route('admin.dashboard') }}"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
        <li><a class="nav-link" href="{{ Route('menu.index') }}"><i class="fas fa-id-card"></i> <span>Menu</span></a></li>
        <li><a class="nav-link" href="{{ Route('chef.index')}}"><i class="fas fa-id-card"></i> <span>Chef</span></a></li>
        <li><a class="nav-link" href="{{ url('reservasi') }}"><i class="fas fa-id-card"></i> <span>Reservasi</span></a></li>
        <li><a class="nav-link" href="{{ url('userAdmin')}}"><i class="fas fa-history"></i> <span>History Login</span></a></li>
      </ul>
      <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
        <form action="{{ route('login.logout') }}" method="post">
          @csrf
          @method('GET')
          <button class="btn btn-primary btn-lg btn-block btn-icon-split">
            <i class="fas fa-sign-out-alt"></i> Logout
          </button>
        </form>
      </div>
    </aside>
  </div>