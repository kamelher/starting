@include('partials.common')
<li class="nav-item">
    <a href="{{ route('services.index') }}" class="nav-link {{ Request::is('services*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>@lang('models/services.plural')</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('registers.index') }}" class="nav-link {{ Request::is('registers*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>@lang('models/registers.plural')</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('mails.index') }}" class="nav-link {{ Request::is('mails*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>@lang('models/mails.plural')</p>
    </a>
</li>

