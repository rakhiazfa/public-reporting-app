<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <style>
        * {
            font-weight: inherit;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-weight: 400;
        }

        table {
            width: 100%;
            text-align: left;
        }

        table th,
        table td {
            padding: 0.35rem 0;
        }

        .container {
            padding: 1.5rem;
            display: grid;
            gap: 1.5rem;
        }

        .card {
            border: 1px solid black;
            padding: 1rem;
        }

    </style>

    <title></title>
</head>
<body>

    <div class="container">

        @foreach ($reports as $report)

        <div class="card">
            <h3 style="font-weight: 500; margin-bottom: 1.5rem;">{{ $report->title }}</h3>

            <table>
                <tr>
                    <th style="width: 175px;">Ticket ID</th>
                    <th>: {{ $report->ticket_id }}</th>
                </tr>
                <tr>
                    <th style="width: 175px;">NIK Pelapor</th>
                    <th>: {{ $report->author->nik }}</th>
                </tr>
                <tr>
                    <th style="width: 175px;">Nama Pelapor</th>
                    <th>: {{ $report->author->user->name }}</th>
                </tr>
                <tr>
                    <th style="width: 175px;">No. HP Pelapor</th>
                    <th>: {{ $report->author->phone }}</th>
                </tr>
                <tr>
                    <th style="width: 175px;">Pekerjaan Pelapor</th>
                    <th>: {{ $report->author->job->name }}</th>
                </tr>
                <tr>
                    <th style="width: 175px;">Instansi Tujuan</th>
                    <th>: {{ $report->destination->name }}</th>
                </tr>
                <tr>
                    <th style="width: 175px;">Tanggal Laporan</th>
                    <th>: {{ date('d F Y', strtotime($report->created_at)) }}</th>
                </tr>
                <tr>
                    <th style="width: 175px;">Bentuk Laporan</th>
                    <th>: {{ ucfirst($report->type) }}</th>
                </tr>
                <tr>
                    <th style="width: 175px;">Kategori Laporan</th>
                    <th>: {{ ucfirst($report->category->name) }}</th>
                </tr>
                <tr>
                    <th style="width: 175px;">Status Laporan</th>
                    <th>: {{ ucfirst($report->status) }}</th>
                </tr>
            </table>
        </div>

        @endforeach

    </div>

    <script>
        window.print();

        window.onafterprint = function() {
            window.location.href = "{{ route('reports') }}";
        }

    </script>

</body>
</html>
