<li class="nav-item menu-is-opening menu-open">
    <a href="#" class="nav-link {{ '#' ? 'active' : '' }} ">
        <i class="nav-icon fas fa-mail-bulk"></i>
        <p>@lang('models/mails.menu_title')
            <i class="fas fa-angle-left @if(app()->getLocale()=='en') right @else left @endif"></i>
        </p>
    </a>
    <ul class="nav nav-treeview" style="display: block;">
        <li class="nav-item">
            <a href="#" class="nav-link {{"#" ? 'active' : '' }} ">
                <i class="nav-icon fas fa-mail-bulk"></i>
                <p>@lang('models/mails.draft')
                </p>
            </a>
        </li>


    </ul>
</li>

