<x-cube.layout title="Edit Masyarakat">

    <x-cube.card class="mb-7" bodyClass="p-0" :scrollPadding="false">
        <nav class="mt-3">
            <ul class="flex items-center gap-1">
                <li><a class="text-blue-500" href="{{ route('societies') }}">Daftar Masyarakat</a> \</li>
                <li><a class="select-none pointer-events-none text-gray-400" href="#">Edit Masyarakat</a></li>
            </ul>
        </nav>
    </x-cube.card>

    @if (session('success'))
        <div class="bg-emerald-400 rounded-lg px-5 py-3 mb-7">
            <p class="text-gray-50 font-normal">{{ session('success') }}</p>
        </div>
    @endif

    <section class="mb-7">

        <div class="grid grid-cols-1">

            <x-cube.card title="Edit Masyarakat">

                <form action="{{ route('societies.update', ['society' => $society]) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <h1 class="text-2xl font-semibold mb-7 mt-5">Data Masyarakat</h1>

                    <div class="grid grid-cols-1 gap-7 mb-7">

                        <div>
                            <label class="label">NIK</label>
                            <input type="text" class="field" name="nik" placeholder="Masukan NIK masyarakat"
                                value="{{ $society->nik }}">
                            @error('nik')
                                <p class="invalid-field">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>

                    <div class="grid grid-cols-1 xl:grid-cols-3 gap-7 mb-7">

                        <div>
                            <label class="label">Nama</label>
                            <input type="text" class="field" name="name" placeholder="Masukan nama masyarakat"
                                value="{{ $society->user->name }}">
                            @error('name')
                                <p class="invalid-field">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="label">Email</label>
                            <input type="text" class="field" name="email" placeholder="Masukan email masyarakat"
                                value="{{ $society->user->email }}">
                            @error('email')
                                <p class="invalid-field">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="label">Username</label>
                            <input type="text" class="field" name="username"
                                placeholder="Masukan username masyarakat" value="{{ $society->user->username }}">
                            @error('username')
                                <p class="invalid-field">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-1 xl:grid-cols-2 gap-7 mb-10">

                        <div>
                            <label class="label">Password Baru</label>
                            <input type="password" class="field" name="password"
                                placeholder="Masukan kata sandi baru masyarakat">
                            @error('password')
                                <p class="invalid-field">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="label">Kofirmasi Password Baru</label>
                            <input type="password" class="field" name="password_confirmation"
                                placeholder="Konfirmasi kata sandi baru masyarakat">
                        </div>

                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="btn bg-primary">Simpan</button>
                    </div>

                </form>

            </x-cube.card>

        </div>

    </section>

</x-cube.layout>
