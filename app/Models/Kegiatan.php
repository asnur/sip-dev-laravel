<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;

    protected $connection = 'pgsql';

    protected $table = 'tbl_kegiatan';

    protected $guarded = ['id'];

    public $timestamps = false;

    public function kegiatanUser()
    {
        return $this->hasMany(KegiatanUser::class, 'id_kegiatan', 'id');
    }
}
