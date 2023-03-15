<x-cube.layout title="Dashboard">

    <section>

        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-7">

            @if (auth()->user()->hasRole('admin'))
            <x-cube.card title="Total Lembaga">
                <div class="flex items-center gap-5">
                    <i class="uil uil-building text-4xl text-blue-500"></i>
                    <h3 class="text-xl font-semibold">30</h3>
                </div>
            </x-cube.card>
            @endif

            @if (auth()->user()->hasRole('admin') ||
            auth()->user()->hasRole('agency'))
            <x-cube.card title="Total Petugas">
                <div class="flex items-center gap-5">
                    <i class="uil uil-user-md text-4xl text-blue-500"></i>
                    <h3 class="text-xl font-semibold">{{ $employeeCount }}</h3>
                </div>
            </x-cube.card>
            @endif

            @if (auth()->user()->hasRole('admin'))
            <x-cube.card title="Total Masyarakat">
                <div class="flex items-center gap-5">
                    <i class="uil uil-user text-4xl text-blue-500"></i>
                    <h3 class="text-xl font-semibold">{{ $societyCount }}</h3>
                </div>
            </x-cube.card>
            @endif

            <x-cube.card title="Total Pengaduan">
                <div class="flex items-center gap-5">
                    <i class="uil uil-file-alt text-4xl text-blue-500"></i>
                    <h3 class="text-xl font-semibold">{{ $reportCount }}</h3>
                </div>
            </x-cube.card>

        </div>

    </section>

</x-cube.layout>
