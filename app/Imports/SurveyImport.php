<?php

namespace App\Imports;

use App\Models\SurveyPerkembangan;
use App\Models\TestSurveyPerkembangan;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class SurveyImport implements ToModel, WithCalculatedFormulas, WithStartRow, WithValidation
{
    /**
     * @return int
     */
    public function startRow(): int
    {
        return 7;
    }

    public function rules(): array
    {
        return [
            0 => 'required',
            1 => 'required',
            2 => 'required',
            3 => 'required',
            4 => 'required',
            5 => 'required',
            6 => 'required',
            7 => 'required',
            8 => 'required',
            9 => 'required',
            10 => 'required',
            11 => 'required',
            12 => 'required',
        ];
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
            'global_id' => $row[12],
            'uid' => base64_encode($row[1] . $row[3] . $row[4] . $row[5] . $row[6] . $row[8] . $row[10]),
            'id_user' => Auth::user()->id,
        ]);
    }
}
