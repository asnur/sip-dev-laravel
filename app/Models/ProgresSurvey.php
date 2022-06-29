<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgresSurvey extends Model
{
    use HasFactory;

    protected $connection = 'pgsql';

    protected $table = 'jumlah_sub_blok';

    protected $guarded = ['id'];

    public $timestamps = false;

    public function survey()
    {
        return $this->hasMany(SurveyPerkembangan::class, 'kelurahan', 'kelurahan');
    }

    public function kelurahan()
    {
        return $this->hasMany(SurveyPerkembangan::class, 'kelurahan', 'kelurahan');
    }
    public function kecamatan()
    {
        return $this->hasMany(SurveyPerkembangan::class, 'kecamatan', 'kecamatan');
    }
}
