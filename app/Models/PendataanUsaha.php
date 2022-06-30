<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendataanUsaha extends Model
{
    use HasFactory;
    protected $connection = 'pgsql';
    protected $table = 'pendataan_usaha';
    protected $guarded = ['id'];
    public $timestamps = false;
}
