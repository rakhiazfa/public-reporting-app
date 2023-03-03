<x-cube.layout title="Detail Laporan Masyarakat">

    <x-cube.card class="mb-7" bodyClass="p-0" :scrollPadding="false">
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

            <p class="text-sm mb-7">
                {!! nl2br(e($report->body)) !!}
            </p>

            <a class="block text-sm text-blue-500 hover:underline mb-7"
                href="{{ url('storage/' . $report->attachment ?? '') }}" target="_blank">
                Lampiran
            </a>

            <div class="flex justify-between items-center gap-20 mb-7">
                <p class="text-sm text-gray-400">{{ $report->date ?? '' }}</p>
                @if ($report->status == 'process')
                    <span class="text-sm font-medium tracking-wide text-blue-500">
                        {{ $report->status ?? '' }}
                    </span>
                @elseif ($report->status == 'accepted')
                    <span class="text-sm font-medium tracking-wide text-emerald-500">
                        {{ $report->status ?? '' }}
                    </span>
                @elseif ($report->status == 'rejected')
                    <span class="text-sm font-medium tracking-wide text-red-500">
                        {{ $report->status ?? '' }}
                    </span>
                @endif
            </div>

            <div class="flex flex-wrap justify-between items-center gap-5">
                <div class="flex flex-wrap items-center gap-5">
                    @if ($report->status == 'process')
                        <button type="button" class="btn btn-sm btn-success modal-trigger"
                            data-target="#sendResponseModal">
                            Tanggapi
                        </button>
                        <form
                            action="{{ route('society-reports.reject', [
                                'slug' => request()->route('slug'),
                            ]) }}"
                            method="POST">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-danger">
                                Tolak
                            </button>
                        </form>
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

        @if ($report->responses->count() > 0)
            <x-cube.card title="Tanggapan">

                @foreach ($report->responses ?? [] as $response)
                    <div class="bg-gray-50 p-5">
                        <p>{!! $response->response ?? '' !!}</p>
                        <p class="text-sm text-gray-500 mt-5">
                            {{ date('d F Y', strtotime($response->created_at ?? '')) }}</p>
                    </div>
                @endforeach

            </x-cube.card>
        @endif

    </section>

    <div class="modal modal-xl" id="sendResponseModal">
        <div class="modal-content top">
            <div class="header">
                <h4>Kirim Tanggapan</h4>
            </div>
            <div class="body">
                <form
                    action="{{ route('society-reports.send_response', [
                        'slug' => request()->route('slug'),
                    ]) }}"
                    method="POST" id="sendResponseForm">
                    @csrf

                    <div class="form-group">
                        <label class="label">Tanggapan</label>
                        <textarea class="field editor" name="response" rows="10"></textarea>
                        @error('response')
                            <p class="invalid-field">{{ $message }}</p>
                        @enderror
                    </div>

                </form>
            </div>
            <div class="footer flex justify-end gap-x-5">
                <button type="button" class="btn btn-sm btn-info modal-cancel-trigger"
                    aria-label="Cancel Modal">Batal</button>
                <button type="button" class="btn btn-sm btn-primary form-trigger" data-target="#sendResponseForm">
                    Kirim
                </button>
            </div>
        </div>
    </div>

</x-cube.layout>
