<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShopDrawing extends Model
{
    protected $table = 'shop_drawing';

    protected $fillable = [
        'tgl_mcu',
        'lokasi',
        'pemohon',
        'area_pelayanan',
        'rekanan',
        'pengawas',
        'dokumentasi',
        'status_digitasi',
        'tanggal_digitasi',
        'keterangan'
    ];

    public $timestamps = false;
}
