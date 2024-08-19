<li class="nav-item menu-is-opening menu-open">
    <a href="#" class="nav-link {{ '#' ? 'active' : '' }} ">
        <i class="nav-icon fas fa-mail-bulk"></i>
        <p>@lang('models/stat.menu_title')
            <i class="fas fa-angle-left @if(app()->getLocale()=='en') right @else left @endif"></i>
        </p>
    </a>
    <ul class="nav nav-treeview" style="display: block;">
        <li class="nav-item">
            <a href="{{route('stats', ['page'=>'home'])}}" class="nav-link {{"#" ? 'active' : '' }} ">
                <i class="nav-icon fas fa-mail-bulk"></i>
                <p>@lang('models/stat.all_by_resto')
                </p>
            </a>
        </li>


    </ul>
</li>

