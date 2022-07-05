<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImagePendataanUsaha extends Model
{
    use HasFactory;

    protected $connection = 'pgsql';

    protected $table = "image_pendataan_usaha";

    public $timestamps = false;

    protected $guarded = ['id'];
}
