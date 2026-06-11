<?php

namespace App\Models;

use App\Models\SerahTerimaAsbuilt;
use Illuminate\Database\Eloquent\Model;

class SerahTerima extends Model
{
    protected $table = 'serah_terima';

    protected $guarded = [];

    public $timestamps = false;

    public function asbuilt()
    {
        return $this->hasMany(
            SerahTerimaAsbuilt::class,
            'serah_terima_id'
        );
    }
}
