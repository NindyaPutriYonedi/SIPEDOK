<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mc1 extends Model
{
    protected $table = 'mc1';

    protected $fillable = [
        'tgl_mc1',
        'lokasi',
        'pemohon',
        'area_pelayanan',
        'rekanan',
        'pengawas',
        'nomor_addendum',
        'keterangan_perubahan',
        'dokumentasi',
    ];
}
