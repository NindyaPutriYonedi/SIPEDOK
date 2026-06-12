<?php

namespace App\Exports;

use App\Models\Contract;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ContractsExport implements FromCollection, WithHeadings, WithMapping
{
    protected $tahun;

    public function __construct($tahun = null)
    {
        $this->tahun = $tahun;
    }

    public function collection()
    {
        $query = Contract::query();

        if ($this->tahun) {

            $query->where(
                'nomor_kontrak',
                'like',
                '%/' . $this->tahun
            );

        }

        return $query->get();
    }

    public function map($contract): array
    {
        return [
            $contract->tanggal_terima,
            $contract->nomor_kontrak,
            $contract->tanggal_mulai,
            $contract->tanggal_berakhir,
            $contract->pekerjaan,
            $contract->lokasi,
            $contract->pelaksana,
            ucfirst($contract->digitasi)
        ];
    }

    public function headings(): array
    {
        return [
            'Tanggal Terima',
            'Nomor Kontrak',
            'Tanggal Mulai',
            'Tanggal Berakhir',
            'Pekerjaan',
            'Lokasi',
            'Pelaksana',
            'Digitasi'
        ];
    }
}
