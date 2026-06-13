@extends('layouts.app')

@section('content')

<h3>Detail Serah Terima</h3>

<table class="table">

<tr>
<td>Nomor</td>
<td>{{ $data->nomor_serah_terima }}</td>
</tr>

<tr>
<td>Kontrak</td>
<td>{{ $data->nama_kontrak }}</td>
</tr>

<tr>
<td>Tanggal</td>
<td>{{ $data->tanggal_serah_terima }}</td>
</tr>

</table>

<h5>Dokumen As Built</h5>

<table class="table table-bordered">

<tr>

<th>No</th>
<th>Nama File</th>
<th>Download</th>

</tr>

@foreach($data->asbuilt as $file)

<tr>

<td>{{ $loop->iteration }}</td>

<td>{{ $file->nama_dokumen }}</td>

<td>

@if(auth()->user()->access_level=='view_download'
|| auth()->user()->role=='admin')

<a
href="/serah-terima/download/{{$file->id}}"
class="btn btn-success">

Download

</a>

@endif

</td>

</tr>

@endforeach

</table>

@endsection
