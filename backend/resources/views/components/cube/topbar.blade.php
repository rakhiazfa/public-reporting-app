<header class="topbar">
    <div class="topbar-container">
        <div class="topbar-left">
            <button class="sidebar-toggler">
                <i class="uis uis-bars"></i>
            </button>
            <h1 class="topbar-title">Hello {{ $user->name ?? '' }} !</h1>
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
                                <a class="dropdown-link" href="#">
                                    <i class="uil uil-user"></i>
                                    <span> Profile </span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-link" href="#">
                                    <i class="uil uil-setting"></i>
                                    <span> Pengaturan </span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-link" href="#">
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
