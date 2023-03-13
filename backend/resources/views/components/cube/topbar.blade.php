<header class="topbar">
    <div class="topbar-container">
        <div class="topbar-left">
            <button class="sidebar-toggler">
                <i class="uis uis-bars"></i>
            </button>
            <div class="hidden md:flex flex-col gap-2">
                <h1 class="topbar-title">{{ $title }}</h1>
                <nav>
                    <ul class="flex items-center gap-1">
                        <li><a class="text-sm font-medium text-gray-500" href="#">Hello, {{ $user->name ?? '' }}</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <nav>
            <ul class="topbar-menu">
                <li>
                    <div class="user-profile topbar-dropdown">
                        <button class="dropdown-toggler">
                            <span>{{ $user->email ?? '' }}</span>
                            <i class="uil uil-angle-down"></i>
                        </button>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-link" href="{{ route('auth.logout') }}">
                                    <i class="uil uil-sign-out-alt"></i>
                                    <span> Logout </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </nav>
    </div>
</header>
