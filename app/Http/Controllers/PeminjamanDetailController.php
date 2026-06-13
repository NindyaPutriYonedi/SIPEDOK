<?php

namespace App\Http\Controllers;

use App\Models\PeminjamanDetail;
use Illuminate\Http\Request;

class PeminjamanDetailController extends Controller
{
    public function store(Request $request)
    {
        PeminjamanDetail::create([

            'peminjaman_id' => $request->peminjaman_id,
            'nomor_kontrak' => $request->nomor_kontrak,
            'keterangan' => $request->keterangan,

        ]);

        return back()
            ->with('success', 'Nomor kontrak berhasil ditambahkan');
    }

    public function destroy($id)
    {
        $data = PeminjamanDetail::findOrFail($id);
        $data->delete();
        return back()
            ->with('success', 'Data kontrak berhasil dihapus');
    }
    public function edit($id)
{
    $data = PeminjamanDetail::findOrFail($id);

    return view(
        'peminjaman_detail.edit',
        compact('data')
    );
}

public function update(Request $request, $id)
{
    $data = PeminjamanDetail::findOrFail($id);

    $data->update([
        'nomor_kontrak' => $request->nomor_kontrak,
        'keterangan' => $request->keterangan,
    ]);

    return redirect(
        '/peminjaman/' . $data->peminjaman_id
    )->with(
        'success',
        'Data kontrak berhasil diupdate'
    );
}
}
