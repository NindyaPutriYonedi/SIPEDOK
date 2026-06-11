<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SerahTerimaAsbuilt extends Model
{
    protected $table = 'serah_terima_asbuilt';

    protected $guarded = [];

    public $timestamps = false;

    public function serahTerima()
    {
        return $this->belongsTo(
            SerahTerima::class,
            'serah_terima_id'
        );
    }
}
