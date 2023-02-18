<x-cube.layout title="Daftar Instansi">

    @if (session('success'))
        <div class="bg-emerald-400 rounded-lg px-5 py-3 mb-7">
            <p class="text-gray-50 font-normal">{{ session('success') }}</p>
        </div>
    @endif

    <section class="mb-7">

        <div class="grid grid-cols-1">

            <x-cube.card title="Daftar Instansi" :actions="[
                [
                    'text' => 'Daftarkan Instansi',
                    'url' => route('agencies.create'),
                ],
            ]">

                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($agencies as $agency)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <th>{{ $agency->name ?? '' }}</th>
                                <td>{{ $agency->user->email ?? '' }}</td>
                                <td>
                                    <div class="table-actions">
                                        <a href="{{ route('agencies.show', ['agency' => $agency]) }}" title="Detail">
                                            <i class="uil uil-eye"></i>
                                        </a>
                                        <a href="{{ route('agencies.edit', ['agency' => $agency]) }}" title="Edit">
                                            <i class="uil uil-pen"></i>
                                        </a>
                                        <a href="{{ route('agencies.destroy', ['agency' => $agency]) }}" title="Delete">
                                            <i class="uil uil-trash-alt"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </x-cube.card>

        </div>

    </section>

</x-cube.layout>
