<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usaha extends Model
{
    use HasFactory;

    protected $table = "usahas";
    protected $primaryKey = "id";
    protected $fillable = [
        'id', 'koordinat', 'judul', 'kategori', 'image', 'catatan'
    ];
}
