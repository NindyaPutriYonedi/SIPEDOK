<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table = 'peminjaman';

    protected $fillable = [
        'tanggal_pinjam',
        'peminjam',
        'tanggal_kembali',
        'status',
        'jumlah_kontrak'
    ];

    public $timestamps = false;

    public function detail()
    {
        return $this->hasMany(
            PeminjamanDetail::class,
            'peminjaman_id'
        );
    }
}
