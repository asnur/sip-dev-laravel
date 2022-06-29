<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyPerkembanganImage extends Model
{
    use HasFactory;
    protected $connection = 'pgsql';

    protected $table = 'image_survey_perkembangan';

    protected $guarded = ['id'];

    public $timestamps = false;
}
