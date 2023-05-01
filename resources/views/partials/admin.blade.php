<li class="nav-item menu-is-opening menu-open">
    <a href="#" class="nav-link {{ Request::is('mails*') ? 'active' : '' }} ">
        <i class="nav-icon fas fa-home"></i>
        <p>@lang('models/mails.plural')
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview" style="display: block;">
        <li class="nav-item">
            <a href="{{ route('mails.index') }}" class="nav-link {{ Request::is('mails*') ? 'active' : '' }} ">
                <i class="nav-icon fas fa-mail-bulk"></i>
                <p>@lang('models/mails.draft')
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('mails.search.arrived') }}"
               class="nav-link {{ Request::is('mails/arrived') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>@lang('models/mails.arrived')</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('mails.search.income') }}"
               class="nav-link {{ Request::is('mails/income') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>@lang('models/mails.income')</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('mails.search.outcome') }}"
               class="nav-link {{ Request::is('mails/outcome') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>@lang('models/mails.outcome')</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('mails.search.needprocess') }}"
               class="nav-link {{ Request::is('mails/needProcess') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>@lang('models/mails.needprocess')</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('mails.search.needdispatch') }}"
               class="nav-link {{ Request::is('mails/needDispatch') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>@lang('models/mails.needdispatch')</p>
            </a>
        </li>
    </ul>
</li>


<li class="nav-item menu-is-opening menu-open">
    <a href="#" class="nav-link {{ Request::is('administration*') ? 'active' : '' }} ">
        <i class="nav-icon fas fa-home"></i>
        <p>@lang('nav.settings')
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview" style="display: block;">

        <li class="nav-item">
            <a href="{{ route('services.index') }}" class="nav-link {{ Request::is('administration/services*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-building"></i>
                <p>@lang('models/services.plural')</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('registers.index') }}" class="nav-link {{ Request::is('administration/registers*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-hand-paper"></i>
                <p>@lang('models/registers.plural')</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('actions.index') }}" class="nav-link {{ Request::is('administration/actions*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-project-diagram"></i>
                <p>@lang('models/actions.plural')</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('users.index') }}" class="nav-link {{ Request::is('administration/users*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-users-cog"></i>
                <p>@lang('models/users.plural')</p>
            </a>
        </li>
        <!-- need to remove -->
        <li class="nav-item">
            <a href="{{ route('laravelroles::roles.index') }}"
               class="nav-link {{ Request::is('administration/roles') ? 'active' : '' }}">
                <i class="nav-icon fas fa-cogs"></i>
                <p>{{__('nav.roles')}}</p>
            </a>
        </li>
    </ul>
</li>

