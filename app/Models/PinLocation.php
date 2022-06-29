<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PinLocation extends Model
{
    use HasFactory;

    protected $connection = 'pgsql';

    protected $table = "pin_location";

    protected $connection = 'pgsql';

    public $timestamps = false;

    protected $fillable = [
        'nama',
        'kordinat',
        'judul',
        'catatan',
        'kelurahan',
        'tipe',
        'user_id'
    ];

    public function image()
    {
        return $this->hasMany(imageFavorite::class, 'id_lokasi', 'id');
    }
}
