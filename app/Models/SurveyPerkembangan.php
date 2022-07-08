<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyPerkembangan extends Model
{
    use HasFactory;

    protected $connection = 'pgsql';

    protected $table = 'survey_perkembangan_wilayah';

    protected $guarded = [];

    // protected $fillable = array('*');

    public $timestamps = false;

    public function image()
    {
        return $this->hasMany(SurveyPerkembanganImage::class, 'id_survey', 'id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'id_user');
    }
}
