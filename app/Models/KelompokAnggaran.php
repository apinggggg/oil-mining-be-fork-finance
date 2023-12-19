<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KelompokAnggaran extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'kelompok_anggaran';
    protected $fillable = [
        'Kelompok_anggaran', 'Deskripsi'
    ];
}
