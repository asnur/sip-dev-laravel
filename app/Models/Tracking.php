<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tracking extends Model
{
    use HasFactory;
    protected $connection = 'pgsql';
    protected $table = 'tracking';
    protected $guarded = ['id'];

    public $timestamps = false;
}
