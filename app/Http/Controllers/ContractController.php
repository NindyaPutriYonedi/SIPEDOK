<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ContractController extends Controller
{
    public function index(Request $request)
    {
        $query = Contract::query();

        // Search
        if ($request->search) {
            $query->where('nomor_kontrak', 'like', '%' . $request->search . '%')
                ->orWhere('pekerjaan', 'like', '%' . $request->search . '%')
                ->orWhere('lokasi', 'like', '%' . $request->search . '%')
                ->orWhere('pelaksana', 'like', '%' . $request->search . '%');
        }

        // Filter Tahun
        if ($request->tahun) {
            $query->where('tahun_kontrak', $request->tahun);
        }

        $contracts = $query
            ->orderBy('id', 'desc')
            ->paginate(10)
            ->withQueryString();

        $tahunList = Contract::select('tahun_kontrak')
            ->distinct()
            ->orderBy('tahun_kontrak', 'desc')
            ->pluck('tahun_kontrak');

        return view('contracts.index', compact(
            'contracts',
            'tahunList'
        ));
    }

    public function export(Request $request)
{
    $query = Contract::query();

    // Filter berdasarkan tahun_kontrak
    if (!empty($request->tahun)) {
        $query->where('tahun_kontrak', $request->tahun);
    }

    $contracts = $query->orderBy('id', 'desc')->get();

    $filename = empty($request->tahun)
        ? 'Data_Kontrak_Semua_Tahun.csv'
        : 'Data_Kontrak_' . $request->tahun . '.csv';

    $headers = [
        'Content-Type' => 'text/csv',
        'Content-Disposition' => "attachment; filename=\"$filename\"",
    ];

    $callback = function () use ($contracts) {

        $file = fopen('php://output', 'w');

        // Header Excel
        fputcsv($file, [
            'No',
            'Tanggal Terima',
            'No Kontrak',
            'Tahun Kontrak',
            'Tanggal Mulai',
            'Tanggal Berakhir',
            'Pekerjaan',
            'Lokasi',
            'Pelaksana',
            'Digitasi'
        ]);

        foreach ($contracts as $index => $contract) {

            fputcsv($file, [
                $index + 1,
                $contract->tanggal_terima,
                $contract->nomor_kontrak,
                $contract->tahun_kontrak,
                $contract->tanggal_mulai,
                $contract->tanggal_berakhir,
                $contract->pekerjaan,
                $contract->lokasi,
                $contract->pelaksana,
                $contract->digitasi
            ]);
        }

        fclose($file);
    };

    return response()->stream($callback, 200, $headers);
}

    public function create()
{
    return view('contracts.create');
}
public function store(Request $request)
{
    $validated = $request->validate([
        'tanggal_terima' => 'required',
        'tahun_kontrak' => 'required',
        'nomor_kontrak' => 'required',
        'lokasi' => 'required',
        'pekerjaan' => 'required',
        'tanggal_mulai' => 'required',
        'tanggal_berakhir' => 'required',
        'pelaksana' => 'required',
        'digitasi' => 'required',
        'berkas' => 'required|mimes:pdf|max:10240'
    ],[
        'tanggal_terima.required' => 'Tanggal terima wajib diisi.',
        'tahun_kontrak.required' => 'Tahun kontrak wajib diisi.',
        'nomor_kontrak.required' => 'Nomor kontrak wajib diisi.',
        'lokasi.required' => 'Lokasi wajib diisi.',
        'pekerjaan.required' => 'Pekerjaan wajib diisi.',
        'tanggal_mulai.required' => 'Tanggal mulai wajib diisi.',
        'tanggal_berakhir.required' => 'Tanggal berakhir wajib diisi.',
        'pelaksana.required' => 'Pelaksana wajib diisi.',
        'digitasi.required' => 'Status digitasi wajib dipilih.',
        'berkas.required' => 'Berkas PDF wajib diupload.',
        'berkas.mimes' => 'Berkas harus berupa PDF.'
    ]);

    $file = $request->file('berkas');

    $tahun = explode('/', $request->nomor_kontrak);
$tahunKontrak = end($tahun);

    $namaFile = time().'_'.$file->getClientOriginalName();

    $file->move(public_path('uploads/contracts'), $namaFile);

    Contract::create([
        'tanggal_terima' => $request->tanggal_terima,
        'tahun_kontrak' => $request->tahun_kontrak,
        'nomor_kontrak' => $request->nomor_kontrak,
        'lokasi' => $request->lokasi,
        'pekerjaan' => $request->pekerjaan,
        'tanggal_mulai' => $request->tanggal_mulai,
        'tanggal_berakhir' => $request->tanggal_berakhir,
        'pelaksana' => $request->pelaksana,
        'digitasi' => $request->digitasi,
        'berkas' => $namaFile
    ]);

    return redirect()
        ->route('contracts.index')
        ->with('success','Data kontrak berhasil ditambahkan.');
}

    public function show(Contract $contract)
{
    return view('contracts.show', compact('contract'));
}
public function edit(Contract $contract)
{
    return view('contracts.edit', compact('contract'));
}
public function update(Request $request, Contract $contract)
{
    $validated = $request->validate([
        'tanggal_terima' => 'required',
        'tahun_kontrak' => 'required',
        'nomor_kontrak' => 'required',
        'lokasi' => 'required',
        'pekerjaan' => 'required',
        'tanggal_mulai' => 'required',
        'tanggal_berakhir' => 'required',
        'pelaksana' => 'required',
        'digitasi' => 'required',
        'berkas' => 'nullable|mimes:pdf|max:10240'
    ],[
        'tanggal_terima.required' => 'Tanggal terima wajib diisi.',
        'tahun_kontrak.required' => 'Tahun kontrak wajib diisi.',
        'nomor_kontrak.required' => 'Nomor kontrak wajib diisi.',
        'lokasi.required' => 'Lokasi wajib diisi.',
        'pekerjaan.required' => 'Pekerjaan wajib diisi.',
        'tanggal_mulai.required' => 'Tanggal mulai wajib diisi.',
        'tanggal_berakhir.required' => 'Tanggal berakhir wajib diisi.',
        'pelaksana.required' => 'Pelaksana wajib diisi.',
        'digitasi.required' => 'Status digitasi wajib dipilih.'
    ]);

    $data = $request->except('berkas');

    if ($request->hasFile('berkas')) {

        if (
            $contract->berkas &&
            file_exists(public_path('uploads/contracts/'.$contract->berkas))
        ) {
            unlink(public_path('uploads/contracts/'.$contract->berkas));
        }

        $file = $request->file('berkas');

        $namaFile = time().'_'.$file->getClientOriginalName();

        $file->move(
            public_path('uploads/contracts'),
            $namaFile
        );

        $data['berkas'] = $namaFile;
    }

    $contract->update($data);

    return redirect()
        ->route('contracts.index')
        ->with('success', 'Data kontrak berhasil diperbarui.');
}

public function download(Contract $contract)
{
    $path = public_path('uploads/contracts/' . $contract->berkas);

    if (!File::exists($path)) {
        abort(404, 'File tidak ditemukan');
    }

    $extension = pathinfo($contract->berkas, PATHINFO_EXTENSION);

    // Ganti karakter yang tidak boleh ada di nama file
    $fileName = str_replace(['/', '\\'], '-', $contract->nomor_kontrak)
                . '.' . $extension;

    return response()->download($path, $fileName);
}
public function destroy(Contract $contract)
{
    // Hapus file jika ada
    $filePath = public_path('uploads/contracts/' . $contract->berkas);

    if ($contract->berkas && File::exists($filePath)) {
        File::delete($filePath);
    }

    // Hapus data dari database
    $contract->delete();

    return redirect()
        ->route('contracts.index')
        ->with('success', 'Data kontrak berhasil dihapus.');
}
}
