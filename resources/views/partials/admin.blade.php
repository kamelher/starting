<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>{{__('nav.home')}}</p>
    </a>
</li>


<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('laravelroles::roles.index') }}" class="nav-link {{ Request::is('roles') ? 'active' : '' }}">
        <i class="nav-icon fas fa-users"></i>
        <p>{{__('nav.roles')}}</p>
    </a>
</li>
