
<li class="nav-item">
    <a href="{{ route('dfms.index') }}" class="nav-link {{ Request::is('dfms*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>@lang('models/dfms.plural')</p>
    </a>
</li>
