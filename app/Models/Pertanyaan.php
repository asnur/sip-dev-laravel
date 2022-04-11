<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pertanyaan extends Model
{
    use HasFactory;

    protected $connection = 'pgsql';

    protected $table = "tbl_pertanyaan";

    public function jawaban()
    {
        return $this->hasMany(JawabanPertanyaan::class, 'id_pertanyaan', 'id');
    }

    // public function jenis()
    // {
    //     return $this->hasOne(JenisPertanyaan::class, 'id', 'jenis')->with('kategori');
    // }
}
