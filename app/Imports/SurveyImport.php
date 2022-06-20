<?php

namespace App\Imports;

use App\Models\SurveyPerkembangan;
use App\Models\TestSurveyPerkembangan;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use Maatwebsite\Excel\Concerns\WithStartRow;

class SurveyImport implements ToModel, WithCalculatedFormulas, WithStartRow
{
    /**
     * @return int
     */
    public function startRow(): int
    {
        return 7;
    }
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new SurveyPerkembangan([
            'id' => $row[0],
            'name' => $row[1],
            'kordinat' => $row[2],
            'id_sub_blok' => $row[3],
            'kelurahan' => strtoupper($row[4]),
            'kecamatan' => strtoupper($row[5]),
            'regional' => $row[6],
            'deskripsi_regional' => $row[7],
            'neighborhood' => $row[8],
            'deskripsi_neighborhood' => $row[9],
            'transect_zone' => $row[10],
            'deskripsi_transect_zone' => $row[11],
            'uid' => base64_encode($row[1] . $row[3] . $row[4] . $row[5] . $row[6] . $row[8] . $row[10]),
            'id_user' => Auth::user()->id,
        ]);
    }
}
