<?php

namespace App\View\Components\Cube;

use Illuminate\View\Component;

class Sidebar extends Component
{
    /**
     * @var array
     */
    public array $items = [];

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
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
        return [
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
                'type' => 'dropdown',
                'icon' => 'uil uil-user',
                'text' => 'Pengguna',
                'items' => [
                    [
                        'url' => route('agencies'),
                        'text' => 'Instansi',
                    ],
                    [
                        'url' => '#',
                        'text' => 'Petugas',
                    ],
                    [
                        'url' => '#',
                        'text' => 'Masyarakat',
                    ],
                ],
            ],

            ['type' => 'title', 'title' => 'Laporan'],

            [
                'type' => 'link',
                'icon' => 'uil uil-file-upload-alt',
                'url' => '#',
                'text' => 'Pengaduan',
            ],

            [
                'type' => 'link',
                'icon' => 'uil uil-file-info-alt',
                'url' => '#',
                'text' => 'Aspirasi',
            ],

            [
                'type' => 'link',
                'icon' => 'uil uil-file-download-alt',
                'url' => '#',
                'text' => 'Permintaan Informasi',
            ],
        ];
    }
}
