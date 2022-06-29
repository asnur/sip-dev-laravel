<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class imageFavorite extends Model
{
    use HasFactory;

    protected $connection = 'pgsql';

    protected $table = "image_favorites";

    public $timestamps = false;

    protected $fillable = [
        'id_lokasi',
        'name'
    ];
}
