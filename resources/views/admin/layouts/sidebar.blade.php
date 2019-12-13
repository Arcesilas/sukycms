<aside class="sidebar" data-theme="default">
    @foreach ($sidebar as $section)
        <h4>{{ $section['title'] }}</h4>
        @foreach ($section['links'] as $link)
            <a href="">{{ $link['title'] }}</a>

            @if (isset($link['submenu']))
                <div class="submenu">
                    @foreach ($link['submenu'] as $sublink)
                        <a href="">{{ $sublink['title'] }}</a>
                    @endforeach
                </div>
            @endif
        @endforeach
    @endforeach
</aside>
