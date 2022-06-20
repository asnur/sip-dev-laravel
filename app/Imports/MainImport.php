<?php

namespace App\Imports;

use App\Imports\SurveyImport as ImportsSurveyImport;
use App\Models\SurveyPerkembangan;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;


class MainImport implements WithCalculatedFormulas
{
    public function sheets(): array
    {
        return [
            0 => new ImportsSurveyImport(),
            1 => new ImageImport(),
        ];
    }
}
