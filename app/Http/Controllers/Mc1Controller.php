<?php

namespace App\Http\Controllers;

use App\Models\Mc1;
use Illuminate\Http\Request;

class Mc1Controller extends Controller
{
    public function index()
    {
        $data = Mc1::all();

        return view('mc1.index', compact('data'));
    }

    public function create()
    {
        return view('mc1.create');
    }

    public function store(Request $request)
    {
        $namaFile = null;

        if ($request->hasFile('dokumentasi')) {

            $file = $request->file('dokumentasi');

            $namaFile = time().'_'.$file->getClientOriginalName();

            $file->move(public_path('dokumentasi'), $namaFile);
        }

        Mc1::create([
            'tgl_mc1' => $request->tgl_mc1,
            'lokasi' => $request->lokasi,
            'pemohon' => $request->pemohon,
            'area_pelayanan' => $request->area_pelayanan,
            'rekanan' => $request->rekanan,
            'pengawas' => $request->pengawas,
            'nomor_addendum' => $request->nomor_addendum,
            'keterangan_perubahan' => $request->keterangan_perubahan,
            'dokumentasi' => $namaFile,
        ]);

        return redirect('/mc1')
            ->with('success', 'Data MC1 berhasil ditambahkan');
    }

    public function show($id)
    {
        $data = Mc1::findOrFail($id);

        return view('mc1.show', compact('data'));
    }

    public function edit($id)
    {
        $data = Mc1::findOrFail($id);

        return view('mc1.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Mc1::findOrFail($id);

        $namaFile = $data->dokumentasi;

        if ($request->hasFile('dokumentasi')) {

            $file = $request->file('dokumentasi');

            $namaFile = time().'_'.$file->getClientOriginalName();

            $file->move(public_path('dokumentasi'), $namaFile);
        }

        $data->update([
            'tgl_mc1' => $request->tgl_mc1,
            'lokasi' => $request->lokasi,
            'pemohon' => $request->pemohon,
            'area_pelayanan' => $request->area_pelayanan,
            'rekanan' => $request->rekanan,
            'pengawas' => $request->pengawas,
            'nomor_addendum' => $request->nomor_addendum,
            'keterangan_perubahan' => $request->keterangan_perubahan,
            'dokumentasi' => $namaFile,
        ]);

        return redirect('/mc1')
            ->with('success', 'Data MC1 berhasil diupdate');
    }

    public function destroy($id)
    {
        $data = Mc1::findOrFail($id);

        $data->delete();

        return redirect('/mc1')
            ->with('success', 'Data MC1 berhasil dihapus');
    }
}
