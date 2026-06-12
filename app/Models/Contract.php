<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $table = 'contracts';

    public $timestamps = false;

    protected $fillable = [
        'nama_kontrak',
        'lokasi',
        'pekerjaan',
        'pelaksana',
        'tanggal_terima',
        'tahun_kontrak',
        'tanggal_mulai',
        'tanggal_berakhir',
        'digitasi',
        'nilai_kontrak',
        'deskripsi',
        'file_path',
        'berkas',
        'status',
        'nomor_kontrak'
    ];
}
