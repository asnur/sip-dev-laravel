<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JawabanPertanyaan extends Model
{
    use HasFactory;
    protected $connection = 'pgsql';

    protected $table = "tbl_jawaban_pertanyaan";

    public function pertanyaan()
    {
        return $this->hasOne(Pertanyaan::class, 'id', 'id_pertanyaan');
    }
}
