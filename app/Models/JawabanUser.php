<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JawabanUser extends Model
{
    use HasFactory;

    protected $connection = 'pgsql';

    protected $table = "tbl_jawaban_user";

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'id_user');
    }
}
