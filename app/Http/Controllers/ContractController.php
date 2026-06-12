<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Exports\ContractsExport;
use Maatwebsite\Excel\Facades\Excel;

class ContractController extends Controller
{
    public function index(Request $request)
{
    $query = Contract::query();

    if ($request->keyword) {

        $query->where(function ($q) use ($request) {

            $q->where('nomor_kontrak', 'like', '%' . $request->keyword . '%')
              ->orWhere('pekerjaan', 'like', '%' . $request->keyword . '%')
              ->orWhere('lokasi', 'like', '%' . $request->keyword . '%')
              ->orWhere('pelaksana', 'like', '%' . $request->keyword . '%');

        });

    }

    if ($request->tahun) {

    $query->where(
        'nomor_kontrak',
        'like',
        '%/' . $request->tahun
    );

}

    $contracts = $query->paginate(10);

    $tahunKontrak = Contract::select('tahun_kontrak')
        ->distinct()
        ->orderBy('tahun_kontrak', 'desc')
        ->pluck('tahun_kontrak');

    return view('contracts.index', compact(
        'contracts',
        'tahunKontrak'
    ));
}
    public function create()
    {
        return view('contracts.create');
    }


    public function store(Request $request)
    {
        //dd($request->hasFile('berkas'), $request->file('berkas'));
        // dd($request->all());
        $file = null;

        if($request->hasFile('berkas'))
        {
            $file = $request
                ->file('berkas')
                ->store('contracts','public');
        }

        Contract::create([
    'nomor_kontrak'    => $request->nomor_kontrak,
    'lokasi'           => $request->lokasi,
    'pekerjaan'        => $request->pekerjaan,
    'pelaksana'        => $request->pelaksana,
    'tanggal_terima'   => $request->tanggal_terima,
    'tahun_kontrak'    => $request->tahun_kontrak,
    'tanggal_mulai'    => $request->tanggal_mulai,
    'tanggal_berakhir' => $request->tanggal_berakhir,
    'digitasi'         => $request->digitasi,
    'berkas'           => $file,
    'file_path'        => $file
]);

        return redirect('/contracts')
            ->with(
                'success',
                'Kontrak berhasil ditambah'
            );
    }

    public function edit($id)
    {
        $contract = Contract::findOrFail($id);

        return view(
            'contracts.edit',
            compact('contract')
        );
    }

   public function update(Request $request, $id)
{
    $contract = Contract::findOrFail($id);

    if ($request->hasFile('berkas')) {

        if ($contract->berkas) {
            Storage::disk('public')->delete($contract->berkas);
        }

        $file = $request->file('berkas')
                        ->store('contracts', 'public');

        $contract->berkas = $file;
        $contract->file_path = $file;
    }

    $contract->nomor_kontrak    = $request->nomor_kontrak;
    $contract->lokasi           = $request->lokasi;
    $contract->pekerjaan        = $request->pekerjaan;
    $contract->pelaksana        = $request->pelaksana;
    $contract->tanggal_terima   = $request->tanggal_terima;
    $contract->tahun_kontrak    = $request->tahun_kontrak;
    $contract->tanggal_mulai    = $request->tanggal_mulai;
    $contract->tanggal_berakhir = $request->tanggal_berakhir;
    $contract->digitasi         = $request->digitasi;

    $contract->save();

    return redirect('/contracts')
        ->with('success', 'Kontrak berhasil diupdate');
}

    public function show($id)
{
    $contract = Contract::findOrFail($id);

    return view('contracts.show', compact('contract'));
}

    public function destroy($id)
    {
        $contract = Contract::findOrFail($id);

        if($contract->berkas)
        {
            Storage::disk('public')
                ->delete(
                    $contract->berkas
                );
        }

        $contract->delete();

        return redirect('/contracts')
            ->with(
                'success',
                'Kontrak berhasil dihapus'
            );
    }

    public function download($id)
{
    $contract = Contract::findOrFail($id);

    if (
        !$contract->berkas ||
        !Storage::disk('public')->exists($contract->berkas)
    ) {
        return back()->with(
            'error',
            'File tidak ditemukan'
        );
    }

    $extension = pathinfo(
        $contract->berkas,
        PATHINFO_EXTENSION
    );

    $namaFile = str_replace(
        ['/','\\',':','*','?','"','<','>','|'],
        '-',
        $contract->nomor_kontrak
    ) . '.' . $extension;

    return Storage::disk('public')
        ->download(
            $contract->berkas,
            $namaFile
        );
}
//     public function export()
// {
//     return Excel::download(new ContractsExport, 'contracts.xlsx');
// }
public function export(Request $request)
{
    $tahun = $request->tahun;

    return Excel::download(
        new ContractsExport($tahun),
        'kontrak-'.$tahun.'.xlsx'
    );
}
}
