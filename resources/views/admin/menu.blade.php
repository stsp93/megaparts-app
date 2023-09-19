<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('admin-home') }}" class="nav-link {{ Request::is('admin-home') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>
    
</li>
<li class="nav-item">
    <a href="{{ route('sliderManagement') }}" class="nav-link {{ Request::is('sliderManagement') ? 'active' : '' }}">
        <i class="fa-solid fa-bars"></i>
        <p>Slider Management</p>
    </a>
</li>
