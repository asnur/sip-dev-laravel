<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgresSurvey extends Model
{
    use HasFactory;

    protected $table = 'jumlah_sub_blok';

    protected $guarded = ['id'];

    public $timestamps = false;
}
