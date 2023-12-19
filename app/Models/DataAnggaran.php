<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\KelompokAnggaran;
use Illuminate\Database\Eloquent\SoftDeletes;

class DataAnggaran extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'data_anggaran';
    protected $fillable = [
        'Anggaran', 'Tanggal', 'Jenis', 'id'
    ];

     /**
      * Get the user that owns the DataAnggaran
      *
      * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
      */
     public function data_Anggaran(): BelongsTo
     {
         return $this->belongsTo(KelompokAnggaran::class, 'id_kelompok_anggaran', 'id');
     }
}
