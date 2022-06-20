<?php

namespace App\Imports;

use App\Models\SurveyPerkembanganImage;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;

class ImageImport implements ToModel, WithCalculatedFormulas
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new SurveyPerkembanganImage([
            'name' => $row[0],
            'id_survey' => $row[1],
        ]);
    }
}
