<?php

namespace App\View\Components\Cube;

use App\Models\User;
use Illuminate\View\Component;

class Sidebar extends Component
{
    /**
     * @var SidebarMenu
     */
    public SidebarMenu $sidebarMenu;

    /**
     * @var User|null
     */
    public User|null $user = null;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(User|null $user = null)
    {
        $this->user = $user;

        $this->sidebarMenu = new SidebarMenu();

        $this->registerItems();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.cube.sidebar');
    }

    /**
     * @return array
     */
    protected function registerItems()
    {
        $isAdmin = $this->user->hasRole('admin');
        $isAgency = $this->user->hasRole('agency');

        $this->sidebarMenu->addMenuTitle('Navigation');

        $this->sidebarMenu->addLinkItem(
            'Dashboard',
            'uil uil-apps',
            route('dashboard'),
            request()->routeIs('dashboard*'),
        );

        $this->sidebarMenu->addMenuTitle('Menu / Item');

        $this->sidebarMenu->addDropdownItem(
            'Pengguna',
            'uil uil-user',
            [
                [
                    'url' => route('agencies'),
                    'text' => 'Instansi',
                    'is_active' =>  request()->routeIs('agencies*'),
                    'condition' => $isAdmin,
                ],
                [
                    'url' => route('employees'),
                    'text' => 'Petugas',
                    'is_active' =>  request()->routeIs('employees*'),
                    'condition' => $isAdmin || $isAgency,
                ],
                [
                    'url' => route('societies'),
                    'text' => 'Masyarakat',
                    'is_active' =>  request()->routeIs('societies*'),
                    'condition' => $isAdmin,
                ],
            ],
            $isAdmin || $isAgency,
        );

        $this->sidebarMenu->addLinkItem(
            'Laporan Masyarakat',
            'uil uil-file-upload-alt',
            route('society-reports'),
            request()->routeIs('society-reports*'),
        );

        $this->sidebarMenu->addMenuTitle('Laporan');

        $this->sidebarMenu->addLinkItem(
            'Laporan',
            'uil uil-file-alt',
            '#',
        );
    }
}

class SidebarMenu
{
    /**
     * @var array
     */
    public array $items = [];

    /**
     * @param string $title
     * 
     * @return void
     */
    public function addMenuTitle(string $title, bool $condition = true)
    {
        $condition && array_push($this->items, ['type' => 'title', 'title' => $title]);
    }

    /**
     * @param string $text
     * @param string $icon
     * @param string $route
     * @param bool $isActive
     * @param bool $condition
     * 
     * @return void
     */
    public function addLinkItem(string $text, string $icon, string $route, bool $isActive = false, bool $condition = true)
    {
        $condition && array_push(
            $this->items,
            [
                'type' => 'link',
                'icon' => $icon,
                'url' => $route,
                'text' => $text,
                'is_active' => $isActive,
            ]
        );
    }

    /**
     * @param string $text
     * @param string $icon
     * @param array $items
     * @param bool $condition
     * 
     * @return void
     */
    public function addDropdownItem(string $text, string $icon, array $items = [], bool $condition = true)
    {
        $renderedItems = [];

        foreach ($items as $item) {
            ($item['condition'] ?? true) && array_push($renderedItems, $item);
        }

        $condition && array_push(
            $this->items,
            [
                'type' => 'dropdown',
                'icon' => $icon,
                'text' => $text,
                'items' => $renderedItems,
            ]
        );
    }
}
