<aside class="sidebar" data-theme="default">
    <div class="logo">
        <img src="{{ asset('images/logo.png') }}" alt="">
    </div>

    @foreach ($sidebar as $section)
        <h4>{{ $section['title'] }}</h4>
        @foreach ($section['links'] as $link)
            <a href="{{ $link['url'] }}" data-sidebarsubmenu="{{ $loop->index }}" class="{{ Request::is($link['active'] ?? null) ? 'active' : '' }}"><i class="{{ $link['icon'] ?? '' }}"></i> {{ $link['title'] }} @if (isset($link['submenu'])) <i class="fas arrow"></i> @endif</a>

            @if (isset($link['submenu']))
                <div class="submenu" data-sidebarsubmenu="{{ $loop->index }}">
                    @foreach ($link['submenu'] as $sublink)
                        <a href=""><i class="fas fa-chevron-right"></i> {{ $sublink['title'] }}</a>
                    @endforeach
                </div>
            @endif
        @endforeach
    @endforeach
</aside>
