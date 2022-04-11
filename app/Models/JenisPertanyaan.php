<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisPertanyaan extends Model
{
    use HasFactory;

    protected $connection = 'pgsql';

    protected $table = "tbl_jenis_pertanyaan";

    // public function kategori()
    // {
    //     return $this->hasOne(KategoriPertanyaan::class, 'id', 'id_kategori');
    // }

    public function pertanyaan()
    {
        return $this->hasMany(Pertanyaan::class, 'jenis', 'id')->with('jawaban');
    }
}
