<x-cube.layout title="Daftar Masyarakat">

    @if (session('success'))
        <div class="bg-emerald-400 rounded-lg px-5 py-3 mb-7">
            <p class="text-gray-50 font-normal">{{ session('success') }}</p>
        </div>
    @endif

    <section class="mb-7">

        <div class="grid grid-cols-1">

            <x-cube.card title="Daftar Masyarakat">

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($societies as $society)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $society->nik ?? '' }}</td>
                                    <th>{{ $society->name ?? '' }}</th>
                                    <td>{{ $society->user->email ?? '' }}</td>
                                    <td>
                                        <div class="table-actions">
                                            <a href="{{ route('societies.show', ['society' => $society]) }}"
                                                title="Detail">
                                                <i class="uil uil-eye"></i>
                                            </a>
                                            <a href="{{ route('societies.edit', ['society' => $society]) }}"
                                                title="Edit">
                                                <i class="uil uil-pen"></i>
                                            </a>
                                            <form action="{{ route('societies.destroy', ['society' => $society]) }}"
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

            </x-cube.card>

        </div>

    </section>

</x-cube.layout>
