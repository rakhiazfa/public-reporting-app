<x-cube.layout title="Detail Instansi">

    <x-cube.card class="mb-7" bodyClass="p-0" :scrollPadding="false">
        <nav class="mt-3">
            <ul class="flex items-center gap-1">
                <li><a class="text-blue-500" href="{{ route('agencies') }}">Daftar Instansi</a> \</li>
                <li><a class="select-none pointer-events-none text-gray-400" href="#">Detail Instansi</a></li>
            </ul>
        </nav>
    </x-cube.card>

    <section class="mb-7">

        <div class="grid grid-cols-1 xl:grid-cols-2 gap-7">

            <x-cube.card title="Detail Instansi" class="h-max">

                <div class="table-responsive">
                    <table class="table table-sm table-bordered">
                        <tr>
                            <th>Nama Instansi</th>
                            <td>{{ $agency->name ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>Email Instansi</th>
                            <td>{{ $agency->user->email ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>Username Instansi</th>
                            <td>{{ $agency->user->username ?? '' }}</td>
                        </tr>
                    </table>
                </div>

            </x-cube.card>

            <x-cube.card title="Lokasi Instansi" class="h-max">

                <div class="table-responsive">
                    <table class="table table-sm table-bordered">
                        <tr>
                            <th>Provinsi</th>
                            <td>{{ $agency->location->province ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>Kota</th>
                            <td>{{ $agency->location->city ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>Kode Pos</th>
                            <td>{{ $agency->location->postal_code ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td>{{ $agency->location->address ?? '' }}</td>
                        </tr>
                    </table>
                </div>

            </x-cube.card>

        </div>

    </section>

</x-cube.layout>
