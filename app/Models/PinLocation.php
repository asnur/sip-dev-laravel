<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PinLocation extends Model
{
    use HasFactory;

    protected $table = "pin_location";

    public $timestamps = false;

    protected $fillable = [
        'nama',
        'kordinat',
        'judul',
        'catatan',
        'kelurahan',
        'user_id'
    ];
}
