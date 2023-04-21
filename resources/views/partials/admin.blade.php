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

<li class="nav-item">
    <a href="{{ route('users.index') }}" class="nav-link {{ Request::is('users*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>@lang('models/users.plural')</p>
    </a>
</li>



<li class="nav-item">
    <a href="{{ route('actions.index') }}" class="nav-link {{ Request::is('actions*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>@lang('models/actions.plural')</p>
    </a>
</li>





<li class="nav-item">
    <a href="{{ route('services.index') }}" class="nav-link {{ Request::is('services*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>@lang('models/services.plural')</p>
    </a>
</li>
