<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\SerahTerima;
use App\Models\SerahTerimaAsbuilt;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class SerahTerimaController extends Controller
{
    public function index()
{
    $data = SerahTerima::with('asbuilt')
        ->latest()
        ->paginate(10);

    return view(
        'serah-terima.index',
        compact('data')
    );
}

    public function create()
{
    $contracts = Contract::all();

    return view('serah-terima.create', compact('contracts'));
}

    public function store(Request $request)
{
    $serahTerima = SerahTerima::create([

        'tanggal_terima' => $request->tanggal_terima,

        'penerima' => $request->penerima,

        'jumlah_asbuilt' => $request->jumlah_asbuilt

    ]);

    foreach($request->no_kontrak as $key => $value)
    {
        SerahTerimaAsbuilt::create([

            'serah_terima_id' => $serahTerima->id,

            'no_kontrak' => $request->no_kontrak[$key],

            'tanggal' => $request->tanggal[$key],

            'rekanan' => $request->rekanan[$key],

            'keterangan' => $request->keterangan[$key]

        ]);
    }

    return redirect('/serah-terima')
        ->with('success', 'Data berhasil disimpan');
}

    public function show($id)
    {
        $data = SerahTerima::with(
            'asbuilt'
        )->findOrFail($id);

        return view(
            'serah-terima.show',
            compact('data')
        );
    }

    public function destroy($id)
{
    $master = SerahTerima::findOrFail($id);

    foreach($master->asbuilt as $detail)
    {
        $detail->delete();
    }

    $master->delete();

    return redirect('/serah-terima')
        ->with(
            'success',
            'Data berhasil dihapus'
        );
}

    public function print($id)
{
    $data = SerahTerima::with('asbuilt')
        ->findOrFail($id);

    return view(
        'serah-terima.print',
        compact('data')
    );
}

    public function pdf($id)
{
    $data = SerahTerima::with('asbuilt')
        ->findOrFail($id);

    return view(
        'serah-terima.pdf',
        compact('data')
    );
}

public function downloadPdf($id)
{
    return redirect()->route(
        'serah-terima.pdf',
        $id
    );
}

    public function edit($id)
{
    $data = SerahTerima::with('asbuilt')
        ->findOrFail($id);

    return view(
        'serah-terima.edit',
        compact('data')
    );
}

public function update(Request $request, $id)
{
    $serahTerima = SerahTerima::findOrFail($id);

    $serahTerima->update([
        'tanggal_terima' => $request->tanggal_terima,
        'penerima' => $request->penerima,
        'jumlah_asbuilt' => count($request->no_kontrak)
    ]);

    foreach($request->detail_id as $index => $detailId)
    {
        SerahTerimaAsbuilt::where(
            'id',
            $detailId
        )->update([

            'no_kontrak'
                => $request->no_kontrak[$index],

            'tanggal'
                => $request->tanggal[$index],

            'rekanan'
                => $request->rekanan[$index],

            'keterangan'
                => $request->keterangan[$index]
        ]);
    }

    return redirect('/serah-terima')
        ->with(
            'success',
            'Data berhasil diperbarui'
        );
}
}
