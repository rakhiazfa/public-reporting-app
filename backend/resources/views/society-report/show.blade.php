<x-cube.layout title="Detail Laporan Masyarakat">

    <x-cube.card class="mb-5" bodyClass="p-0" :scrollPadding="false">
        <nav class="mt-3">
            <ul class="flex items-center gap-1">
                <li><a class="text-blue-500" href="{{ route('society-reports') }}">Daftar Laporan Masyarakat</a> \</li>
                <li><a class="select-none pointer-events-none text-gray-400" href="#">Detail Laporan Masyarakat</a>
                </li>
            </ul>
        </nav>
    </x-cube.card>

    @if (session('success'))
        <div class="bg-emerald-400 rounded-lg px-5 py-3">
            <p class="text-gray-50 font-normal">{{ session('success') }}</p>
        </div>
    @endif

    <section class="grid grid-cols-1 gap-7 mb-7">

        <x-cube.card title=" {{ $report->title ?? '' }}" class="">

            <embed class="border mb-10 object-contain" src="{{ asset('storage/' . $report->attachment) }}"
                width="100%" height="500px" alt="Cover">

            <p class="text-sm mb-7">
                {!! nl2br(e($report->body)) !!}
            </p>

            <div class="flex items-center justify-between mb-7">
                <p class="text-sm text-gray-500 font-normal">{{ $report->ticket_id }}</p>
                <a class="block text-sm text-blue-500 hover:underline"
                    href="{{ url('storage/' . $report->attachment ?? '') }}" target="_blank">
                    Lampiran
                </a>
            </div>

            <div class="flex justify-between items-center gap-20 mb-7">
                <p class="text-sm text-gray-400">{{ $report->date ?? '' }}</p>
                @if ($report->status == 'process')
                    <span class="text-sm font-medium tracking-wide text-blue-500">
                        {{ ucfirst($report->status ?? '') }}
                    </span>
                @elseif ($report->status == 'accepted')
                    <span class="text-sm font-medium tracking-wide text-emerald-500">
                        {{ ucfirst($report->status ?? '') }}
                    </span>
                @elseif ($report->status == 'rejected')
                    <span class="text-sm font-medium tracking-wide text-red-500">
                        {{ ucfirst($report->status ?? '') }}
                    </span>
                @endif
            </div>

            <div class="flex flex-wrap justify-between items-center gap-5">
                <div class="flex flex-wrap items-center gap-5">
                    @if ($report->status == 'process')
                        <form
                            action="{{ route('society-reports.accept', [
                                'slug' => request()->route('slug'),
                            ]) }}"
                            method="POST">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-success">
                                Terima
                            </button>
                        </form>
                        <button type="button" class="btn btn-sm btn-danger modal-trigger"
                            data-target="#rejectReportModal">
                            Tolak
                        </button>
                    @endif
                </div>
                <form action="{{ route('society-reports.destroy', ['societyReport' => $report]) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-sm btn-danger">
                        Delete
                    </button>
                </form>
            </div>

        </x-cube.card>

        @if ($report->status == 'accepted')
            <x-cube.card title="Tanggapan" class="">

                <div class="grid gap-5 mb-5">
                    @foreach ($report->messages as $message)
                        <div
                            class="{{ $message->from === auth()->id() ? 'bg-blue-400 text-white' : 'bg-gray-100 text-black' }} p-5 rounded-md">
                            <div class="flex items-center gap-x-3 mb-5">
                                <div class="w-[40px] lg:w-[45px] aspect-square bg-gray-300 rounded-full">
                                    <img class="rounded-full"
                                        src="{{ $message->messageOrigin->avatar ? url('storage/' . $message->messageOrigin->avatar) : $defaultAvatarImage }}"
                                        alt="Avatar">
                                </div>
                                <div>
                                    <p
                                        class="text-xs lg:text-sm font-medium max-w-[175px] overflow-hidden whitespace-nowrap mb-1 {{ $message->from === auth()->id() ? 'text-white' : 'text-black' }}">
                                        {{ $message->messageOrigin->name ?? '' }}
                                    </p>
                                    <p
                                        class="text-[0.65rem] lg:text-[0.7rem] {{ $message->from === auth()->id() ? 'text-white' : 'text-gray-500' }} font-normal max-w-[175px] overflow-hidden whitespace-nowrap">
                                        {{ date('d F Y', strtotime($message->created_at)) }}
                                    </p>
                                </div>
                            </div>
                            <p class="text-[0.8rem] text-inherit font-normal">
                                {{ $message->message }}
                            </p>
                        </div>
                    @endforeach
                </div>

                <form action="{{ route('society-reports.send_response', ['slug' => request()->route('slug')]) }}"
                    method="POST">
                    @csrf

                    <div class="form-group mb-7">
                        <label class="label">Pesan</label>
                        <textarea class="field" name="message" rows="3" placeholder="Ketik tanggapan anda . . ."></textarea>
                        @error('message')
                            <p class="invalid-field">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </div>

                </form>

            </x-cube.card>
        @endif

    </section>

    <div class="modal" id="rejectReportModal">
        <div class="modal-content top">
            <div class="header">
                <h4>Masukan alasan anda menolak laporan ini</h4>
            </div>
            <div class="body">
                <form
                    action="{{ route('society-reports.reject', [
                        'slug' => request()->route('slug'),
                    ]) }}"
                    method="POST" id="rejectReportForm">
                    @csrf

                    <div class="form-group">
                        <label class="label">Alasan</label>
                        <textarea type="text" class="field" name="reason" placeholder="Alasan"></textarea>
                        @error('reason')
                            <p class="invalid-field">{{ $message }}</p>
                        @enderror
                    </div>
                </form>
            </div>
            <div class="footer flex justify-end gap-x-5">
                <button type="button" class="btn btn-sm btn-info modal-cancel-trigger">Cancel</button>
                <button type="button" class="btn btn-sm btn-border btn-danger form-trigger"
                    data-target="#rejectReportForm" aria-label="Delete Account">
                    Tolak
                </button>
            </div>
        </div>
    </div>

</x-cube.layout>
