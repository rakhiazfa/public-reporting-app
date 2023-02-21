<x-cube.layout title="Daftar Petugas">

    @if (session('success'))
        <div class="bg-emerald-400 rounded-lg px-5 py-3 mb-7">
            <p class="text-gray-50 font-normal">{{ session('success') }}</p>
        </div>
    @endif

    <section class="mb-7">

        <div class="grid grid-cols-1">

            <x-cube.card title="Daftar Petugas" :actions="[
                [
                    'text' => 'Daftarkan Petugas',
                    'url' => route('employees.create'),
                ],
            ]">

                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employees as $employee)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $employee->nip ?? '' }}</td>
                                <th>{{ $employee->user->name ?? '' }}</th>
                                <td>{{ $employee->user->email ?? '' }}</td>
                                <td>
                                    <div class="table-actions">
                                        <a href="{{ route('employees.show', ['employee' => $employee]) }}" title="Detail">
                                            <i class="uil uil-eye"></i>
                                        </a>
                                        <a href="{{ route('employees.edit', ['employee' => $employee]) }}"
                                            title="Edit">
                                            <i class="uil uil-pen"></i>
                                        </a>
                                        <form action="{{ route('employees.destroy', ['employee' => $employee]) }}"
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

            </x-cube.card>

        </div>

    </section>

</x-cube.layout>
