<?php

namespace App\Http\Controllers;

use App\Models\ShopDrawing;
use Illuminate\Http\Request;

class ShopDrawingController extends Controller
{
    public function index(Request $request)
    {
        $query = ShopDrawing::query();

        if ($request->filled('lokasi')) {
            $query->where(
                'lokasi',
                'like',
                '%' . $request->lokasi . '%'
            );
        }

        if ($request->filled('pemohon')) {
            $query->where(
                'pemohon',
                'like',
                '%' . $request->pemohon . '%'
            );
        }

        if ($request->filled('bulan')) {
            $query->whereMonth(
                'tgl_mcu',
                $request->bulan
            );
        }

        if ($request->filled('tahun')) {
            $query->whereYear(
                'tgl_mcu',
                $request->tahun
            );
        }

        $data = $query->get();

        return view('mc0.index', compact('data'));
    }

    public function create()
    {
        return view('mc0.create');
    }

    public function store(Request $request)
    {
        $namaFile = null;

        if ($request->hasFile('dokumentasi')) {

            $file = $request->file('dokumentasi');

            $namaFile = time() . '_' . $file->getClientOriginalName();

            $file->move(
                public_path('dokumentasi'),
                $namaFile
            );
        }

        ShopDrawing::create([
            'tgl_mcu' => $request->tgl_mcu,
            'lokasi' => $request->lokasi,
            'pemohon' => $request->pemohon,
            'area_pelayanan' => $request->area_pelayanan,
            'rekanan' => $request->rekanan,
            'pengawas' => $request->pengawas,
            'dokumentasi' => $namaFile,
            'status_digitasi' => $request->status_digitasi,
            'tanggal_digitasi' => $request->tanggal_digitasi,
            'keterangan' => $request->keterangan,
        ]);

        return redirect('/mc0')
            ->with(
                'success',
                'Data MC0 berhasil ditambahkan'
            );
    }

    public function show($id)
    {
        $data = ShopDrawing::findOrFail($id);

        return view(
            'mc0.show',
            compact('data')
        );
    }

    public function edit($id)
    {
        $data = ShopDrawing::findOrFail($id);

        return view(
            'mc0.edit',
            compact('data')
        );
    }

    public function update(Request $request, $id)
    {
        $data = ShopDrawing::findOrFail($id);

        $namaFile = $data->dokumentasi;

        if ($request->hasFile('dokumentasi')) {

            $file = $request->file('dokumentasi');

            $namaFile = time() . '_' .
                $file->getClientOriginalName();

            $file->move(
                public_path('dokumentasi'),
                $namaFile
            );
        }

        $data->update([
            'tgl_mcu' => $request->tgl_mcu,
            'lokasi' => $request->lokasi,
            'pemohon' => $request->pemohon,
            'area_pelayanan' => $request->area_pelayanan,
            'rekanan' => $request->rekanan,
            'pengawas' => $request->pengawas,
            'dokumentasi' => $namaFile,
            'status_digitasi' => $request->status_digitasi,
            'tanggal_digitasi' => $request->tanggal_digitasi,
            'keterangan' => $request->keterangan,
        ]);

        return redirect('/mc0')
            ->with(
                'success',
                'Data berhasil diupdate'
            );
    }

    public function destroy($id)
    {
        $data = ShopDrawing::findOrFail($id);

        $data->delete();

        return redirect('/mc0')
            ->with(
                'success',
                'Data berhasil dihapus'
            );
    }
}
