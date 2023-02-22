<x-cube.layout title="Detail Masyarakat">

    <x-cube.card class="mb-7" bodyClass="p-0" :scrollPadding="false">
        <nav class="mt-3">
            <ul class="flex items-center gap-1">
                <li><a class="text-blue-500" href="{{ route('societies') }}">Daftar Masyarakat</a> \</li>
                <li><a class="select-none pointer-events-none text-gray-400" href="#">Detail Masyarakat</a></li>
            </ul>
        </nav>
    </x-cube.card>

    <section class="mb-7">

        <div class="grid grid-cols-1 xl:grid-cols-2 gap-7">

            <x-cube.card title="Detail Masyarakat" class="h-max">

                <div class="table-responsive">
                    <table class="table table-sm table-bordered">
                        <tr>
                            <th>NIK</th>
                            <td>{{ $society->nik ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>Nama</th>
                            <td>{{ $society->name ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $society->user->email ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>Username</th>
                            <td>{{ $society->user->username ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>Nomor Telepon</th>
                            <td>{{ $society->phone ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Lahir</th>
                            <td>{{ $society->date_of_birth ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>Jenis Kelamin</th>
                            <td>{{ $society->gender ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>Pekerjaan</th>
                            <td>{{ $society->job->name ?? '' }}</td>
                        </tr>
                    </table>
                </div>

            </x-cube.card>

            <x-cube.card title="Lokasi Masyarakat" class="h-max">

                <div class="table-responsive">
                    <table class="table table-sm table-bordered">
                        <tr>
                            <th>Provinsi</th>
                            <td>{{ $society->location->province ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>Kota</th>
                            <td>{{ $society->location->city ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>Kecamatan</th>
                            <td>{{ $society->location->sub_district ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>Kelurahan</th>
                            <td>{{ $society->location->urban_village ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>Kode Pos</th>
                            <td>{{ $society->location->postal_code ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td>{{ $society->location->address ?? '' }}</td>
                        </tr>
                    </table>
                </div>

            </x-cube.card>

        </div>

    </section>

</x-cube.layout>
