<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">

<style>

@page{
    margin:20px;
}

body{
    font-family:"Times New Roman", serif;
    font-size:13px;
}

.paper{
    width:100%;
}

.document{
    border:1px solid #000;
    padding:15px;
}

.title{
    text-align:center;
    font-weight:bold;
    font-size:18px;
}

.subtitle{
    text-align:center;
    font-weight:bold;
    font-size:18px;
    margin-bottom:15px;
}

.table{
    width:100%;
    border-collapse:collapse;
    margin-top:10px;
    margin-bottom:10px;
}

.table th,
.table td{
    border:1px solid #000;
    padding:4px;
    text-align:center;
    font-size:12px;
}

.signature{
    width:100%;
    margin-top:40px;
}

.signature td{
    width:50%;
    text-align:center;
}

.ttd-space{
    height:70px;
}

.line{
    width:150px;
    border-bottom:1px solid #000;
    margin:auto;
}

.cut-paper{
    margin:25px 0;
    border-top:1px dashed #888;
    width:100%;
}

</style>
</head>

<body>

<div class="paper">

<div class="document">

<div class="title">
Berita Acara Penerimaan
</div>

<div class="subtitle">
As Built Drawing
</div>

<p>

Pada hari ini,

{{ \Carbon\Carbon::parse($data->tanggal_terima)->translatedFormat('d F Y') }},

saya yang bertanda tangan di bawah ini:

<br>

<strong>
{{ strtoupper($data->penerima) }}
</strong>

<br>

dengan ini menerangkan telah menerima
as built drawing sesuai daftar terlampir:

</p>

<table class="table">

<tr>

<th width="50">No</th>
<th>No Kontrak</th>
<th width="110">Tanggal</th>
<th>Rekanan</th>
<th>Keterangan</th>

</tr>

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

</table>

<p>

Demikian Berita Acara Penerimaan As Built Drawing
ini dibuat untuk dapat dipergunakan sebagaimana mestinya.

</p>

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

<div class="line"></div>

</td>

<td>

<strong>
{{ strtoupper($data->penerima) }}
</strong>

</td>

</tr>

</table>

</div>

<div class="cut-paper">

</div>

<div class="document">

<div class="title">
Berita Acara Penerimaan
</div>

<div class="subtitle">
As Built Drawing
</div>

<p>

Pada hari ini,

{{ \Carbon\Carbon::parse($data->tanggal_terima)->translatedFormat('d F Y') }},

saya yang bertanda tangan di bawah ini:

<br>

<strong>
{{ strtoupper($data->penerima) }}
</strong>

<br>

dengan ini menerangkan telah menerima
as built drawing sesuai daftar terlampir:

</p>

<table class="table">

<tr>

<th width="50">No</th>
<th>No Kontrak</th>
<th width="110">Tanggal</th>
<th>Rekanan</th>
<th>Keterangan</th>

</tr>

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

</table>

<p>

Demikian Berita Acara Penerimaan As Built Drawing
ini dibuat untuk dapat dipergunakan sebagaimana mestinya.

</p>

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

<div class="line"></div>

</td>

<td>

<strong>
{{ strtoupper($data->penerima) }}
</strong>

</td>

</tr>

</table>

</div>

</div>

</body>
</html>
