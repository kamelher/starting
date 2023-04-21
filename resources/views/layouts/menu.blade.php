<!-- need to remove -->
@include('partials.admin')

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
