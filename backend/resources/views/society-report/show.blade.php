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

    <section class="mb-7">

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
                        <button type="submit" class="btn btn-sm bg-success">
                            Terima
                        </button><button type="submit" class="btn btn-sm bg-danger">
                            Tolak
                        </button>
                    @endif
                </div>
                <form action="{{ route('society-reports.destroy', ['societyReport' => $report]) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-sm bg-danger">
                        Delete
                    </button>
                </form>
            </div>

        </x-cube.card>

    </section>

</x-cube.layout>
