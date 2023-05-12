<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>{{__('nav.home')}}</p>
    </a>
</li>


@role('admin')
@include('partials.admin')
@endrole


@role('secretariat')
@include('partials.secretariat')
@endrole


<li class="nav-item">
    <a href="{{ route('etablissements.index') }}" class="nav-link {{ Request::is('etablissements*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>@lang('models/etablissements.plural')</p>
    </a>
</li>
