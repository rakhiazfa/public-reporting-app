<x-cube.layout title="Detail Petugas">

    <x-cube.card class="mb-7" bodyClass="p-0" :scrollPadding="false">
        <nav class="mt-3">
            <ul class="flex items-center gap-1">
                <li><a class="text-blue-500" href="{{ route('employees') }}">Daftar Petugas</a> \</li>
                <li><a class="select-none pointer-events-none text-gray-400" href="#">Detail Petugas</a></li>
            </ul>
        </nav>
    </x-cube.card>

    <section class="mb-7">

        <div class="grid grid-cols-1 xl:grid-cols-2 gap-7">

            <x-cube.card title="Detail Petugas" class="h-max">

                <div class="table-responsive">
                    <table class="table table-sm table-bordered">
                        <tr>
                            <th>NIP Petugas</th>
                            <td>{{ $employee->nip ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>Nama Petugas</th>
                            <td>{{ $employee->user->name ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>Email Petugas</th>
                            <td>{{ $employee->user->email ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>Username Petugas</th>
                            <td>{{ $employee->user->username ?? '' }}</td>
                        </tr>
                    </table>
                </div>

            </x-cube.card>

            <x-cube.card title="Instansi Petugas" class="h-max">

                <div class="table-responsive">
                    <table class="table table-sm table-bordered">
                        <tr>
                            <th>Nama Instansi</th>
                            <td>{{ $employee->agency->name ?? '' }}</td>
                        </tr>
                    </table>
                </div>

            </x-cube.card>

        </div>

    </section>

</x-cube.layout>
