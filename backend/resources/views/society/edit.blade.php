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

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 mb-7">

                        <div class="form-group lg:col-span-2">
                            <label class="label">NIK</label>
                            <input type="text" class="field" name="nik" placeholder="Masukan NIK masyarakat"
                                value="{{ $society->nik }}">
                            @error('nik')
                                <p class="invalid-field">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="label">Tanggal Lahir</label>
                            <input type="date" class="field" name="date_of_birth"
                                placeholder="Masukan tanggal lahir masyarakat" value="{{ $society->date_of_birth }}">
                            @error('date_of_birth')
                                <p class="invalid-field">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="label">Jenis Kelamin</label>
                            <select class="field" name="gender">
                                <option {{ $society->gender === 'Pria' ? 'selected' : '' }} value="Pria">
                                    Pria
                                </option>
                                <option {{ $society->gender === 'Wanita' ? 'selected' : '' }} value="Wanita">
                                    Wanita
                                </option>
                            </select>
                            @error('gender')
                                <p class="invalid-field">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="label">Nomor Telepon</label>
                            <input type="text" class="field" name="phone"
                                placeholder="Masukan nomor telepon masyarakat" value="{{ $society->phone }}">
                            @error('phone')
                                <p class="invalid-field">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="label">Pekerjaan</label>
                            <select class="field" name="job_id">
                                @foreach ($jobs as $job)
                                    <option {{ $society->job_id === $job->id ? 'selected' : '' }}
                                        value="{{ $job->id }}">
                                        {{ $job->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('job_id')
                                <p class="invalid-field">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>

                    <div class="grid grid-cols-1 xl:grid-cols-3 gap-10 mb-7">

                        <div class="form-group">
                            <label class="label">Nama</label>
                            <input type="text" class="field" name="name" placeholder="Masukan nama masyarakat"
                                value="{{ $society->user->name }}">
                            @error('name')
                                <p class="invalid-field">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="label">Email</label>
                            <input type="text" class="field" name="email" placeholder="Masukan email masyarakat"
                                value="{{ $society->user->email }}">
                            @error('email')
                                <p class="invalid-field">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="label">Username</label>
                            <input type="text" class="field" name="username"
                                placeholder="Masukan username masyarakat" value="{{ $society->user->username }}">
                            @error('username')
                                <p class="invalid-field">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-1 xl:grid-cols-2 gap-10 mb-10">

                        <div class="form-group">
                            <label class="label">Password Baru</label>
                            <input type="password" class="field" name="password"
                                placeholder="Masukan kata sandi baru masyarakat">
                            @error('password')
                                <p class="invalid-field">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="label">Kofirmasi Password Baru</label>
                            <input type="password" class="field" name="password_confirmation"
                                placeholder="Konfirmasi kata sandi baru masyarakat">
                        </div>

                    </div>

                    <h1 class="text-2xl font-semibold mb-7">Lokasi Masyarakat</h1>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-1 xl:grid-cols-2 gap-10 mb-7">

                        <div class="form-group">
                            <label class="label">Negara</label>
                            <input type="text" class="field" placeholder="" value="Indonesia" disabled readonly>
                        </div>

                        <div class="form-group">
                            <label class="label">Provinsi</label>
                            <input type="text" class="field" name="province" placeholder=""
                                value="{{ $society->location->province }}">
                            @error('province')
                                <p class="invalid-field">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="label">Kota</label>
                            <input type="text" class="field" name="city" placeholder=""
                                value="{{ $society->location->city }}">
                            @error('city')
                                <p class="invalid-field">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="label">Kota</label>
                            <input type="text" class="field" name="sub_district" placeholder=""
                                value="{{ $society->location->sub_district }}">
                            @error('sub_district')
                                <p class="invalid-field">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="label">Kelurahan / Desa</label>
                            <input type="text" class="field" name="urban_village" placeholder=""
                                value="{{ $society->location->urban_village }}">
                            @error('urban_village')
                                <p class="invalid-field">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="label">Kode Pos</label>
                            <input type="text" class="field" name="postal_code" placeholder=""
                                value="{{ $society->location->postal_code }}">
                            @error('postal_code')
                                <p class="invalid-field">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="md:col-span-2 lg:col-span-1 xl:col-span-2">
                            <label class="label">Alamat</label>
                            <textarea class="field" name="address" rows="3">{{ $society->location->address }}</textarea>
                            @error('address')
                                <p class="invalid-field">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>

                </form>

            </x-cube.card>

        </div>

    </section>

</x-cube.layout>
