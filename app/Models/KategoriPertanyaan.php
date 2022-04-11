<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriPertanyaan extends Model
{
    use HasFactory;

    protected $connection = 'pgsql';

    protected $table = "tbl_kategori_pertanyaan";

    public function jenis()
    {
        return $this->hasMany(JenisPertanyaan::class, 'id_kategori', 'id')->with('pertanyaan');
    }
}
