<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use HasFactory;

    protected $connection = 'pgsql';

    protected $table = "survey";

    protected $guarded = ["id"];

    public $timestamps = false;
}
