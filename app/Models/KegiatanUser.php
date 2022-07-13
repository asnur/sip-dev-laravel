<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KegiatanUser extends Model
{
    use HasFactory;

    protected $connection = 'pgsql';

    protected $table = 'tbl_kegiatan_user';

    protected $guarded = ['id'];

    public $timestamps = false;

    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class, 'id_kegiatan', 'id');
    }
}
