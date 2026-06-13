<!DOCTYPE html>

<html>

<head>

    <meta charset="UTF-8">

    <title>Bukti Peminjaman Dokumen</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 30px;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .header h4,
        .header h5 {
            margin: 0;
        }

        .header hr {
            border: 1px solid black;
        }

        .ttd {
            margin-top: 80px;
            width: 250px;
            float: right;
            text-align: center;
        }
    </style>

</head>

<body onload="window.print()">

    <div class="header">

        <h4 class="fw-bold">
            PERUMDA AIR MINUM KOTA PADANG
        </h4>

        <h5>
            SISTEM INFORMASI PENGELOLAAN DOKUMEN (SIPEDOK)
        </h5>

        <h4 class="mt-4 fw-bold">
            BUKTI PEMINJAMAN DOKUMEN
        </h4>

        <hr>

    </div>

    <table class="table table-bordered">

        <tr>
            <th width="250">
                Nama Peminjam
            </th>

            <td>
                {{ $data->peminjam }}
            </td>
        </tr>

        <tr>
            <th>
                Tanggal Pinjam
            </th>

            <td>
                {{ $data->tanggal_pinjam }}
            </td>
        </tr>

        <tr>
            <th>
                Tanggal Kembali
            </th>

            <td>
                {{ $data->tanggal_kembali }}
            </td>
        </tr>

        <tr>
            <th>
                Status
            </th>

            <td>
                {{ $data->status }}
            </td>
        </tr>

        <tr>
            <th>
                Jumlah Kontrak
            </th>

            <td>
                {{ $data->jumlah_kontrak }}
            </td>
        </tr>

    </table>

    <h5 class="mt-4 mb-3">
        Daftar Kontrak Yang Dipinjam
    </h5>

    <table class="table table-bordered">

        <thead>

            <tr>
                <th width="70">No</th>
                <th>Nomor Kontrak</th>
                <th>Keterangan</th>
            </tr>

        </thead>

        <tbody>

            @forelse($data->detail as $item)
                <tr>

                    <td>
                        {{ $loop->iteration }}
                    </td>

                    <td>
                        {{ $item->nomor_kontrak }}
                    </td>

                    <td>
                        {{ $item->keterangan ?? '-' }}
                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="3" class="text-center">

                        Tidak ada data kontrak

                    </td>

                </tr>
            @endforelse

        </tbody>

    </table>

    <div class="row mt-5">

        <div class="col-6 text-center">

            Mengetahui,
            <br>
            Petugas

            <br><br><br><br>

            (__________________)

        </div>

        <div class="col-6 text-center">

            Padang,
            {{ date('d-m-Y') }}

            <br>

            Peminjam

            <br><br><br><br>

            ({{ $data->peminjam }})

        </div>

    </div>

</body>

</html>
