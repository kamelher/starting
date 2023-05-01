<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ route('home') }}" class="brand-link">
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/88/%D9%88%D8%B2%D8%A7%D8%B1%D8%A9_%D8%A7%D9%84%D8%AA%D8%B9%D9%84%D9%8A%D9%85_%D8%A7%D9%84%D8%B9%D8%A7%D9%84%D9%8A_%D9%88%D8%A7%D9%84%D8%A8%D8%AD%D8%AB_%D8%A7%D9%84%D8%B9%D9%84%D9%85%D9%8A.svg/langfr-560px-%D9%88%D8%B2%D8%A7%D8%B1%D8%A9_%D8%A7%D9%84%D8%AA%D8%B9%D9%84%D9%8A%D9%85_%D8%A7%D9%84%D8%B9%D8%A7%D9%84%D9%8A_%D9%88%D8%A7%D9%84%D8%A8%D8%AD%D8%AB_%D8%A7%D9%84%D8%B9%D9%84%D9%85%D9%8A.svg.png"
             alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3">
        <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
    </a>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @include('layouts.menu')
            </ul>
        </nav>
    </div>

</aside>
