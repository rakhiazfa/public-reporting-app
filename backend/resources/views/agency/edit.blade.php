<x-cube.layout title="Perbarui Instansi">

    <x-cube.card class="mb-7" bodyClass="p-0" :scrollPadding="false">
        <nav class="mt-3">
            <ul class="flex items-center gap-1">
                <li><a class="text-blue-500" href="{{ route('agencies') }}">Daftar Instansi</a> \</li>
                <li><a class="select-none pointer-events-none text-gray-400" href="#">Perbarui Instansi</a></li>
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

            <x-cube.card title="Perbarui Instansi">

                <form action="{{ route('agencies.update', ['agency' => $agency]) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <h1 class="text-2xl font-semibold mb-7 mt-5">Data Instansi</h1>

                    <div class="grid grid-cols-1 xl:grid-cols-3 gap-7 mb-7">

                        <div>
                            <label class="label">Nama</label>
                            <input type="text" class="field" name="name" placeholder="Masukan nama instansi"
                                value="{{ $agency->name }}">
                            @error('name')
                                <p class="invalid-field">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="label">Email</label>
                            <input type="text" class="field" name="email" placeholder="Masukan email instansi"
                                value="{{ $agency->user->email }}">
                            @error('email')
                                <p class="invalid-field">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="label">Username</label>
                            <input type="text" class="field" name="username" placeholder="Masukan username instansi"
                                value="{{ $agency->user->username }}">
                            @error('username')
                                <p class="invalid-field">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-1 xl:grid-cols-2 gap-7 mb-10">

                        <div>
                            <label class="label">Password Baru</label>
                            <input type="password" class="field" name="password"
                                placeholder="Masukan kata sandi baru instansi">
                            @error('password')
                                <p class="invalid-field">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="label">Konfirmasi Password Baru</label>
                            <input type="password" class="field" name="password_confirmation"
                                placeholder="Konfirmasi kata sandi baru instansi">
                        </div>

                    </div>

                    <h1 class="text-2xl font-semibold mb-7">Lokasi Instansi</h1>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-1 xl:grid-cols-2 gap-7 mb-7">

                        <div>
                            <label class="label">Negara</label>
                            <input type="text" class="field" placeholder="" value="Indonesia" disabled readonly>
                        </div>

                        <div>
                            <label class="label">Provinsi</label>
                            <input type="text" class="field" name="province" placeholder=""
                                value="{{ $agency->location->province }}">
                            @error('province')
                                <p class="invalid-field">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="label">Kota</label>
                            <input type="text" class="field" name="city" placeholder=""
                                value="{{ $agency->location->city }}">
                            @error('city')
                                <p class="invalid-field">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="label">Kode Pos</label>
                            <input type="text" class="field" name="postal_code" placeholder=""
                                value="{{ $agency->location->postal_code }}">
                            @error('postal_code')
                                <p class="invalid-field">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="md:col-span-2 lg:col-span-1 xl:col-span-2">
                            <label class="label">Alamat</label>
                            <textarea class="field" name="address" rows="3">{{ $agency->location->address }}</textarea>
                            @error('address')
                                <p class="invalid-field">{{ $message }}</p>
                            @enderror
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
