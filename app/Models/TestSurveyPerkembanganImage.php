<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestSurveyPerkembanganImage extends Model
{
    use HasFactory;
    protected $connection = 'pgsql';

    protected $table = 'test_image_survey_perkembangan';

    protected $guarded = ['id'];

    public $timestamps = false;
}
