<x-layout title="Login">

    <main class="min-h-screen bg-gray-50">

        <section class="min-h-screen bg-bl">

            <div class="normal-wrapper min-h-screen flex justify-center items-center">


                <x-cube.card class="w-[450px] shadow-sm px-3 py-10 pb-3">

                    <h1 class="text-2xl font-semibold mb-10">Login</h1>

                    <form class="grid gap-5" method="POST">
                        @csrf

                        <div>
                            <label class="label">Email atau Username</label>
                            <input type="text" class="field" name="email_or_username"
                                value="{{ old('email_or_username') }}"
                                placeholder="Masukan email atau username anda . . .">
                            @error('email_or_username')
                                <p class="invalid-field">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="label">Kata Sandi</label>
                            <input type="password" class="field" name="password"
                                placeholder="Masukan kata sandi anda . . .">
                            @error('password')
                                <p class="invalid-field">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex justify-end mt-3">
                            <button class="btn bg-primary">Login</button>
                        </div>

                    </form>

                </x-cube.card>

            </div>

        </section>

    </main>

</x-layout>
