<x-cube.layout title="Edit Petugas">

    <x-cube.card class="mb-7" bodyClass="p-0" :scrollPadding="false">
        <nav class="mt-3">
            <ul class="flex items-center gap-1">
                <li><a class="text-blue-500" href="{{ route('employees') }}">Daftar Petugas</a> \</li>
                <li><a class="select-none pointer-events-none text-gray-400" href="#">Edit Petugas</a></li>
            </ul>
        </nav>
    </x-cube.card>

    <section class="mb-7">

        <div class="grid grid-cols-1">

            <x-cube.card title="Edit Petugas">

                <form action="{{ route('employees.update', ['employee' => $employee]) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <h1 class="text-2xl font-semibold mb-7 mt-5">Data Petugas</h1>

                    <div class="grid grid-cols-1 gap-10 mb-7">

                        <div>
                            <label class="label">NIP</label>
                            <input type="text" class="field" name="nip" placeholder="Masukan NIP petugas"
                                value="{{ $employee->nip }}">
                            @error('nip')
                                <p class="invalid-field">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>

                    <div class="grid grid-cols-1 xl:grid-cols-3 gap-10 mb-7">

                        <div>
                            <label class="label">Nama</label>
                            <input type="text" class="field" name="name" placeholder="Masukan nama petugas"
                                value="{{ $employee->user->name }}">
                            @error('name')
                                <p class="invalid-field">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="label">Email</label>
                            <input type="text" class="field" name="email" placeholder="Masukan email petugas"
                                value="{{ $employee->user->email }}">
                            @error('email')
                                <p class="invalid-field">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="label">Username</label>
                            <input type="text" class="field" name="username" placeholder="Masukan username petugas"
                                value="{{ $employee->user->username }}">
                            @error('username')
                                <p class="invalid-field">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-1 xl:grid-cols-2 gap-10 mb-10">

                        <div>
                            <label class="label">Password Baru</label>
                            <input type="password" class="field" name="password"
                                placeholder="Masukan kata sandi baru petugas">
                            @error('password')
                                <p class="invalid-field">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="label">Kofirmasi Password Baru</label>
                            <input type="password" class="field" name="password_confirmation"
                                placeholder="Konfirmasi kata sandi baru petugas">
                        </div>

                    </div>

                    @if (auth()->user()->role->name === 'admin')
                        <div class="grid grid-cols-1 gap-10 mb-10">

                            <div>
                                <label class="label">Instansi</label>
                                <select name="agency_id" class="field">
                                    <option selected disabled>- Pilih instansi petugas -</option>
                                    @foreach ($agencies as $agency)
                                        <option value="{{ $agency->id }}"
                                            {{ $agency->id === $employee->agency->id ? 'selected' : '' }}>
                                            {{ $agency->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('agency_id')
                                    <p class="invalid-field">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>
                    @endif

                    <div class="flex justify-end">
                        <button type="submit" class="btn bg-primary">Simpan</button>
                    </div>

                </form>

            </x-cube.card>

        </div>

    </section>

</x-cube.layout>
