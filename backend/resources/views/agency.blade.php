<x-cube.layout title="Daftar Instansi">

    @if (session('success'))
        <div class="bg-emerald-400 rounded-lg px-5 py-3 mb-7">
            <p class="text-gray-50 font-normal">{{ session('success') }}</p>
        </div>
    @endif

    <section class="mb-7">

        <div class="grid grid-cols-1 gap-7">

            <x-cube.card title="Filter">
                <form class="-mt-2 flex items-center gap-5" method="GET">
                    <div class="form-group">
                        <input type="text" class="field rounded" name="q" value="{{ request()->get('q') }}"
                            placeholder="Cari instansi . . .">
                    </div>
                    <button type="submit" class="btn btn-primary">Search</button>
                    <a href="{{ route('agencies') }}" class="btn btn-primary">Refresh</a>
                </form>
            </x-cube.card>

            <x-cube.card title="Daftar Instansi" :actions="[
                [
                    'text' => 'Daftarkan Instansi',
                    'url' => route('agencies.create'),
                ],
            ]">

                <div class="table-responsive">
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
                                    <td>{{ ($agencies->currentPage() - 1) * $agencies->perPage() + $loop->iteration }}
                                    </td>
                                    <th>{{ $agency->name ?? '' }}</th>
                                    <td>{{ $agency->user->email ?? '' }}</td>
                                    <td>
                                        <div class="table-actions">
                                            <a href="{{ route('agencies.show', ['agency' => $agency]) }}"
                                                title="Detail">
                                                <i class="uil uil-eye"></i>
                                            </a>
                                            <a href="{{ route('agencies.edit', ['agency' => $agency]) }}"
                                                title="Edit">
                                                <i class="uil uil-pen"></i>
                                            </a>
                                            <form action="{{ route('agencies.destroy', ['agency' => $agency]) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" title="Delete">
                                                    <i class="uil uil-trash-alt"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-5">
                    {{ $agencies->links('pagination.tailwind') }}
                </div>

            </x-cube.card>

        </div>

    </section>

</x-cube.layout>
