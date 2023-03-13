<x-cube.layout title="Reports">

    <section>

        <div class="grid grid-cols-1 gap-7">

            <x-cube.card title="Laporan">

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIK</th>
                                <th>Nama Masyarakat</th>
                                <th>Instansi Tujuan</th>
                                <th>Tanggal Laporan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reports as $report)
                                <tr>
                                    <td>{{ ($reports->currentPage() - 1) * $reports->perPage() + $loop->iteration }}
                                    </td>
                                    <td>{{ $report->author->nik ?? '' }}</td>
                                    <th>{{ $report->author->name ?? '' }}</th>
                                    <td>{{ $report->destination->name ?? '' }}</td>
                                    <td>{{ date('d F Y', strtotime($report->created_at ?? '')) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-5">
                    {{ $reports->links('pagination.tailwind') }}
                </div>

            </x-cube.card>

        </div>

    </section>

</x-cube.layout>
