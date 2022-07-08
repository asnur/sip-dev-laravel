<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SektorModel extends Model
{
    use HasFactory;

    protected $connection = 'pgsql';

    protected $table = 'tbl_sektor';
}
