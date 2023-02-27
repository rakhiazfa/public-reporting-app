<x-cube.layout title="Daftar Laporan Masyarakat">

    @if (session('success'))
        <div class="bg-emerald-400 rounded-lg px-5 py-3 mb-7">
            <p class="text-gray-50 font-normal">{{ session('success') }}</p>
        </div>
    @endif

    <section class="mb-7">

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-1 xl:grid-cols-2 gap-10">

            @foreach ($societyReports as $report)
                <a class="block" href="{{ route('society-reports.show', ['slug' => $report->slug ?? '']) }}">
                    <x-cube.card title=" {{ Str::of($report->title ?? '')->words(4, ' . . . ') ?? '' }}"
                        class="hover:shadow-md transition-all duration-300 h-full relative">

                        <p class="text-sm mb-10">
                            {{ Str::limit($report->body ?? '', 50, ' . . . ') }}
                        </p>

                        <div class="flex justify-between items-center gap-20 absolute bottom-0 left-0 w-full p-5">
                            <p class="text-sm text-gray-400">{{ $report->date ?? '' }}</p>
                            @if ($report->status == 'process')
                                <span class="text-xs font-medium tracking-wide text-blue-500">
                                    {{ $report->status ?? '' }}
                                </span>
                            @elseif ($report->status == 'accepted')
                                <span class="text-xs font-medium tracking-wide text-emerald-500">
                                    {{ $report->status ?? '' }}
                                </span>
                            @elseif ($report->status == 'rejected')
                                <span class="text-xs font-medium tracking-wide text-red-500">
                                    {{ $report->status ?? '' }}
                                </span>
                            @endif
                        </div>

                    </x-cube.card>
                </a>
            @endforeach

        </div>

    </section>

</x-cube.layout>
