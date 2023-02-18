<aside class="sidebar">
    <div class="sidebar-container">
        <div class="sidebar-header">
            <h1>LOGO</h1>
        </div>
        <nav class="menu-wrapper">
            <ul class="sidebar-menu">

                @foreach ($items as $item)
                    @if ($item['type'] === 'title')
                        <li class="menu-title">{{ $item['title'] ?? '' }}</li>
                    @elseif($item['type'] === 'link')
                        <li>
                            <a class="sidebar-link {{ $item['is_active'] ?? false ? 'active' : '' }}"
                                href="{{ $item['url'] ?? '' }}">
                                <i class="{{ $item['icon'] ?? '' }}"></i>
                                <span> {{ $item['text'] ?? '' }} </span>
                            </a>
                        </li>
                    @elseif($item['type'] === 'dropdown')
                        <li class="sidebar-dropdown">
                            <a class="sidebar-link dropdown-toggler" href="#">
                                <i class="uil uil-user"></i>
                                <span> Pengguna </span>
                                <i class="uil uil-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu">
                                @foreach ($item['items'] ?? [] as $item)
                                    <li>
                                        <a class="sidebar-link {{ $item['is_active'] ?? false ? 'active' : '' }}"
                                            href="{{ $item['url'] ?? '' }}">
                                            <i class="{{ $item['icon'] ?? '' }}"></i>
                                            <span> {{ $item['text'] ?? '' }} </span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endif
                @endforeach

            </ul>
        </nav>
    </div>
</aside>
