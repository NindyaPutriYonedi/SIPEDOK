<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Berita Acara Penerimaan As Built Drawing</title>

<style>

body{
    margin:0;
    padding:0;
    background:#dcdcdc;
    font-family:"Times New Roman", serif;
}

.page-wrapper{
    width:900px;
    margin:0 auto;
    padding-bottom:40px;
}

.top-button{
    text-align:center;
    margin:20px 0;
}

.btn{
    display:inline-block;
    padding:10px 16px;
    border-radius:4px;
    text-decoration:none;
    color:white;
    font-size:14px;
    font-weight:bold;
    margin:0 4px;
}

.btn-back{
    background:#6c757d;
}

.btn-print{
    background:#0d6efd;
}

.btn-pdf{
    background:#198754;
}

.paper{
    background:white;
    width:760px;
    margin:0 auto;
    padding:28px;
    box-shadow:0 2px 10px rgba(0,0,0,.08);
}

.document{
    border:1px solid #000;
    padding:14px;
}

.title{
    text-align:center;
    font-weight:bold;
    font-size:18px;
    margin-top:5px;
}

.subtitle{
    text-align:center;
    font-weight:bold;
    font-size:18px;
    margin-bottom:15px;
}

.content{
    font-size:14px;
    line-height:1.5;
}

.contract-table{
    width:100%;
    border-collapse:collapse;
    margin-top:10px;
    margin-bottom:10px;
}

.contract-table th,
.contract-table td{
    border:1px solid #000;
    padding:4px;
    font-size:12px;
    text-align:center;
}

.contract-table th{
    font-weight:bold;
}

.signature{
    width:100%;
    margin-top:40px;
}

.signature td{
    width:50%;
    text-align:center;
    vertical-align:top;
}

.ttd-space{
    height:80px;
}

.line-sign{
    width:160px;
    border-bottom:1px solid #000;
    margin:0 auto;
}

.receiver-name{
    font-weight:bold;
    margin-top:12px;
}

.cut-line{
    width:760px;
    margin:25px auto;
    position:relative;
    text-align:center;
}

.cut-line hr{
    border:none;
    border-top:1px dashed #999;
}

.cut-line span{
    position:absolute;
    left:50%;
    top:-10px;
    transform:translateX(-50%);
    background:#dcdcdc;
    padding:0 10px;
    font-size:20px;
    color:#777;
}

@media print{

    body{
        background:white;
    }

    .top-button{
        display:none;
    }

    .paper{
        box-shadow:none;
        margin:0 auto;
        width:100%;
    }

    .cut-line span{
        background:white;
    }
}

</style>
</head>

<body>

<div class="page-wrapper">

    <div class="top-button">

    {{-- <a href="/serah-terima"
       class="btn btn-back">

        ← Kembali

    </a> --}}

    <a href="/serah-terima/{{ $data->id }}/pdf"
       target="_blank"
       class="btn btn-print">

        Print

    </a>

    <a href="/serah-terima/{{ $data->id }}/download-pdf"
       class="btn btn-pdf">

        Download

    </a>

</div>

    {{-- LEMBAR 1 --}}
    <div class="paper">

        <div class="document">

            <div class="title">
                Berita Acara Penerimaan
            </div>

            <div class="subtitle">
                As Built Drawing
            </div>

            <div class="content">

                Pada hari ini,
                {{ \Carbon\Carbon::parse($data->tanggal_terima)->translatedFormat('d F Y') }},
                saya yang bertanda tangan di bawah ini:

                <br>

                {{ strtoupper($data->penerima) }}

                <br>

                dengan ini menerangkan telah menerima
                as built drawing sesuai daftar terlampir:

            </div>

            <table class="contract-table">

                <thead>

                <tr>
                    <th width="50">No</th>
                    <th>No Kontrak</th>
                    <th width="120">Tanggal</th>
                    <th>Rekanan</th>
                    <th>Keterangan</th>
                </tr>

                </thead>

                <tbody>

                @foreach($data->asbuilt as $detail)

                <tr>

                    <td>
                        {{ $loop->iteration }}
                    </td>

                    <td>
                        {{ $detail->no_kontrak }}
                    </td>

                    <td>
                        {{ \Carbon\Carbon::parse($detail->tanggal)->format('d-m-Y') }}
                    </td>

                    <td>
                        {{ $detail->rekanan }}
                    </td>

                    <td>
                        {{ $detail->keterangan }}
                    </td>

                </tr>

                @endforeach

                </tbody>

            </table>

            <div class="content">

                Demikian Berita Acara Penerimaan As Built Drawing
                ini dibuat untuk dapat dipergunakan sebagaimana mestinya.

            </div>

            <table class="signature">

                <tr>

                    <td>
                        Yang Menyerahkan
                    </td>

                    <td>
                        Yang Menerima
                    </td>

                </tr>

                <tr>

                    <td class="ttd-space"></td>

                    <td class="ttd-space"></td>

                </tr>

                <tr>

                    <td>

                        <div class="line-sign"></div>

                    </td>

                    <td>

                        <div class="receiver-name">
                            {{ strtoupper($data->penerima) }}
                        </div>

                    </td>

                </tr>

            </table>

        </div>

    </div>

    <div class="cut-line">

        <hr>

        <span>✂</span>

    </div>

    {{-- LEMBAR 2 --}}
    <div class="paper">

        <div class="document">

            <div class="title">
                Berita Acara Penerimaan
            </div>

            <div class="subtitle">
                As Built Drawing
            </div>

            <div class="content">

                Pada hari ini,
                {{ \Carbon\Carbon::parse($data->tanggal_terima)->translatedFormat('d F Y') }},
                saya yang bertanda tangan di bawah ini:

                <br>

                {{ strtoupper($data->penerima) }}

                <br>

                dengan ini menerangkan telah menerima
                as built drawing sesuai daftar terlampir:

            </div>

            <table class="contract-table">

                <thead>

                <tr>
                    <th width="50">No</th>
                    <th>No Kontrak</th>
                    <th width="120">Tanggal</th>
                    <th>Rekanan</th>
                    <th>Keterangan</th>
                </tr>

                </thead>

                <tbody>

                @foreach($data->asbuilt as $detail)

                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $detail->no_kontrak }}</td>

                    <td>
                        {{ \Carbon\Carbon::parse($detail->tanggal)->format('d-m-Y') }}
                    </td>

                    <td>{{ $detail->rekanan }}</td>

                    <td>{{ $detail->keterangan }}</td>

                </tr>

                @endforeach

                </tbody>

            </table>

            <div class="content">

                Demikian Berita Acara Penerimaan As Built Drawing
                ini dibuat untuk dapat dipergunakan sebagaimana mestinya.

            </div>

            <table class="signature">

                <tr>

                    <td>
                        Yang Menyerahkan
                    </td>

                    <td>
                        Yang Menerima
                    </td>

                </tr>

                <tr>

                    <td class="ttd-space"></td>

                    <td class="ttd-space"></td>

                </tr>

                <tr>

                    <td>

                        <div class="line-sign"></div>

                    </td>

                    <td>

                        <div class="receiver-name">
                            {{ strtoupper($data->penerima) }}
                        </div>

                    </td>

                </tr>

            </table>

        </div>

    </div>

</div>


</body>

</html>

