<header>
    <div class="left-menu">
        <a href="{{ route('admin.dashboard') }}" class="{{ Request::is('admin/panel*') ? 'active' : '' }}" data-tooltip="{{ __('admin.sidebar.panel') }}"><i class="fas fa-columns"></i></a>
        <a href="{{ route('admin.web.index') }}" class="{{ Request::is('admin/web*') ? 'active' : '' }}" data-tooltip="{{ __('admin.sidebar.web') }}"><i class="fas fa-desktop"></i></a>
        <a href="{{ route('admin.configuration.modules.index') }}" class="{{ Request::is('admin/configuration*') ? 'active' : '' }}" data-tooltip="{{ __('admin.sidebar.configuration') }}"><i class="fas fa-cogs"></i></a>
    </div>
    <div class="right-menu">
        <a href=""><i class="fas fa-search"></i></a>
        <a href=""><i class="fas fa-bell"></i></a>
        <a href="" class="avatar"><img src="{{ asset('images/jaimesares.jpg') }}" alt=""></a>
    </div>
</header>
