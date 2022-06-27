<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViewDetil extends Model
{
    use HasFactory;

    protected $connection = 'pgsql';

    public $table = "detil_survey";
}
