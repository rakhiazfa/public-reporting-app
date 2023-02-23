<?php

namespace App\View\Components\Cube;

use App\Models\User;
use Illuminate\View\Component;

class Sidebar extends Component
{
    /**
     * @var array
     */
    public array $items = [];

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
        $user->load('role');

        $this->user = $user;

        $this->items = $this->items();
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
    public function items()
    {
        $adminOrAgency = $this->user->hasRole('admin', 'agency');

        $users = [
            'type' => 'dropdown',
            'icon' => 'uil uil-user',
            'text' => 'Pengguna',
            'items' => [
                [
                    'url' => route('employees'),
                    'text' => 'Petugas',
                    'is_active' => request()->routeIs('employees*'),
                ],
            ],
        ];

        $this->user->hasRole('admin') && array_unshift($users['items'], [
            'url' => route('agencies'),
            'text' => 'Instansi',
            'is_active' => request()->routeIs('agencies*'),
        ]);

        $this->user->hasRole('admin') && array_push($users['items'],  [
            'url' => route('societies'),
            'text' => 'Masyarakat',
            'is_active' => request()->routeIs('societies*'),
        ],);

        $items = [
            ['type' => 'title', 'title' => 'Navigasi'],

            [
                'type' => 'link',
                'icon' => 'uil uil-apps',
                'url' => route('dashboard'),
                'text' => 'Dashboard',
                'is_active' => request()->routeIs('dashboard*'),
            ],

            ['type' => 'title', 'title' => 'Menu / Item'],

            [
                'type' => 'link',
                'icon' => 'uil uil-file-upload-alt',
                'url' => route('society-reports'),
                'text' => 'Laporan Masyarakat',
                'is_active' => request()->routeIs('society-reports*'),
            ],

            ['type' => 'title', 'title' => 'Laporan'],

            [
                'type' => 'link',
                'icon' => 'uil uil-file-alt',
                'url' => '#',
                'text' => 'Laporan',
            ],
        ];

        $adminOrAgency && array_splice($items, 3, 0, [$users]);

        return $items;
    }
}
