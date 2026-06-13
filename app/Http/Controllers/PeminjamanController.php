<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index()
    {
        $data = Peminjaman::all();

        return view('peminjaman.index', compact('data'));
    }

    public function create()
    {
        return view('peminjaman.create');
    }

    public function store(Request $request)
    {
        Peminjaman::create([
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'peminjam' => $request->peminjam,
            'tanggal_kembali' => $request->tanggal_kembali,
            'status' => $request->status,
            'jumlah_kontrak' => $request->jumlah_kontrak,
        ]);

        return redirect('/peminjaman')
            ->with('success', 'Data peminjaman berhasil ditambahkan');
    }

    public function show($id)
    {
        $data = Peminjaman::with('detail')
            ->findOrFail($id);

        return view('peminjaman.show', compact('data'));
    }

    public function edit($id)
    {
        $data = Peminjaman::findOrFail($id);

        return view('peminjaman.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Peminjaman::findOrFail($id);

        $data->update([
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'peminjam' => $request->peminjam,
            'tanggal_kembali' => $request->tanggal_kembali,
            'status' => $request->status,
            'jumlah_kontrak' => $request->jumlah_kontrak,
        ]);

        return redirect('/peminjaman')
            ->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        $data = Peminjaman::findOrFail($id);

        $data->delete();

        return redirect('/peminjaman')
            ->with('success', 'Data berhasil dihapus');
    }
}
