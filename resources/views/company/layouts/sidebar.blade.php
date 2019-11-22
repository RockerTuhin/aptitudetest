@if(Auth::guard('company')->check())
<!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('company_home') }}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="{{ route('create_job') }}">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Create Job</span></a>
      </li>
    </ul>
@endif