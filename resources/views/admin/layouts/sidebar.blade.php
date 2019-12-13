<aside class="sidebar" data-theme="default">
    <div class="logo">
        <img src="{{ asset('images/logo.png') }}" alt="">
    </div>

    @foreach ($sidebar as $section)
        <h4>{{ $section['title'] }}</h4>
        @foreach ($section['links'] as $link)
            <a href=""><i class="{{ $link['icon'] ?? '' }}"></i> {{ $link['title'] }}</a>

            @if (isset($link['submenu']))
                <div class="submenu">
                    @foreach ($link['submenu'] as $sublink)
                        <a href=""><i class="{{ $sublink['icon'] ?? '' }}"></i> {{ $sublink['title'] }}</a>
                    @endforeach
                </div>
            @endif
        @endforeach
    @endforeach
</aside>
