<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>{{__('nav.home')}}</p>
    </a>
</li>
@role('admin')

@include('partials.admin')
@include('partials.dou')
@endrole

@role('dou')
@include('partials.dou')
@endrole

<li class="nav-item">
    <a href="{{ route('clients.index') }}" class="nav-link {{ Request::is('clients*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>@lang('models/clients.plural')</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('vendeurs.index') }}" class="nav-link {{ Request::is('vendeurs*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>@lang('models/vendeurs.plural')</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('dfms.index') }}" class="nav-link {{ Request::is('dfms*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>@lang('models/dfms.plural')</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('restos.index') }}" class="nav-link {{ Request::is('restos*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>@lang('models/restos.plural')</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('meal-types.index') }}" class="nav-link {{ Request::is('mealTypes*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>@lang('models/mealTypes.plural')</p>
    </a>
</li>
