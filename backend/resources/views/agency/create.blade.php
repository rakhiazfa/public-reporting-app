<x-cube.layout title="Daftarkan Instansi">

    <x-cube.card class="mb-7" bodyClass="p-0" :scrollPadding="false">
        <nav class="mt-3">
            <ul class="flex items-center gap-1">
                <li><a class="text-blue-500" href="{{ route('agencies') }}">Daftar Instansi</a> \</li>
                <li><a class="select-none pointer-events-none text-gray-400" href="#">Daftarkan Instansi</a></li>
            </ul>
        </nav>
    </x-cube.card>

    <section class="mb-7">

        <div class="grid grid-cols-1">

            <x-cube.card title="Daftarkan Instansi">

                <form action="{{ route('agencies.store') }}" method="POST">
                    @csrf

                    <h1 class="text-2xl font-semibold mb-7 mt-5">Data Instansi</h1>

                    <div class="grid grid-cols-1 xl:grid-cols-3 gap-7 mb-7">

                        <div>
                            <label class="label">Nama</label>
                            <input type="text" class="field" name="name" placeholder="Masukan nama instansi"
                                value="{{ old('name') }}">
                            @error('name')
                                <p class="invalid-field">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="label">Email</label>
                            <input type="text" class="field" name="email" placeholder="Masukan email instansi"
                                value="{{ old('email') }}">
                            @error('email')
                                <p class="invalid-field">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="label">Username</label>
                            <input type="text" class="field" name="username" placeholder="Masukan username instansi"
                                value="{{ old('username') }}">
                            @error('username')
                                <p class="invalid-field">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-1 xl:grid-cols-2 gap-7 mb-10">

                        <div>
                            <label class="label">Password</label>
                            <input type="password" class="field" name="password"
                                placeholder="Masukan kata sandi instansi">
                            @error('password')
                                <p class="invalid-field">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="label">Password</label>
                            <input type="password" class="field" name="password_confirmation"
                                placeholder="Konfirmasi kata sandi instansi">
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
                                value="{{ old('province') }}">
                            @error('province')
                                <p class="invalid-field">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="label">Kota</label>
                            <input type="text" class="field" name="city" placeholder=""
                                value="{{ old('city') }}">
                            @error('city')
                                <p class="invalid-field">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="label">Kode Pos</label>
                            <input type="text" class="field" name="postal_code" placeholder=""
                                value="{{ old('postal_code') }}">
                            @error('postal_code')
                                <p class="invalid-field">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="md:col-span-2 lg:col-span-1 xl:col-span-2">
                            <label class="label">Alamat</label>
                            <textarea class="field" name="address" rows="3">{{ old('address') }}</textarea>
                            @error('address')
                                <p class="invalid-field">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="btn bg-primary">Daftarkan</button>
                    </div>

                </form>

            </x-cube.card>

        </div>

    </section>

</x-cube.layout>
