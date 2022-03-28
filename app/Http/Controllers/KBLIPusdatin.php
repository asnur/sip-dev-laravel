<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class KBLIPusdatin extends Controller
{
    public $token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI5M2JmYzJiMS0yYjY3LTRjM2MtYjE2Mi1kOTZiNGRkYTM3YWEiLCJqdGkiOiJlNzcyODg1ODhjNDkyMTJiMTI5MGUyOTEyZGU0MGRhMjBiZjBiZmQxODc0M2E3ZjI1MDBkNzhiMTM1NWY5YzNjMjJhNWE0YWRmMjY2Y2EzMSIsImlhdCI6MTY0MzM0OTg3My42NzkzNjYsIm5iZiI6MTY0MzM0OTg3My42NzkzNzEsImV4cCI6MTY3NDg4NTg3My42Njk0NDEsInN1YiI6IiIsInNjb3BlcyI6W119.Dr0UYsK3Xy22hV3nptssqv4USBXK3kNPUCJ9uVy2yA693jv7wmABOiugGDfEjs9b7hYF8bwL_cp3KuqjWVcNZTnTrOTWyRlaPhpSGXzydj_2nKtFDXnnmmwWI2TA8zQMBjcTOu48-fs1L7Bra7G_JIsA16sMW98dLIfBTgiwHlpCSdnezaOCUp42rZG0OALu2IFqxhh0MSygCy1E34Y1YykThVfHopm4_XGk2JfF43aA1moZrqOg_R5j5BF5vnEzJ3z1hvREXsiCdfzXe3YpgSims_IbwXieP7UZxzOQ3wbSWhXMErjnY4V1O7LMlBMCD80YczYl2WD3YLvYqM9S5xxEe_wfnKKFtGH8AyFOJGQrjALADrK4zfT-1AxX-CV33mTvX4pt83OItua7paenKhatImrgdNWKkgmx46H8p3nz_NQ8mpIYGEx4aJT9LkIheZOflYbWRgp5S0VVZq-yoZmL-U4XDC3mm7SqXN4rXr51WYtphua1Q1SRgP3glVOdAMmHtIAc52gBMr6FhvzlKWqWRSHl-RfD1sgiUuhUF78eKk9rJYMvbeTgtRD6ZNZT-1ZtLB-Gk1nG0H9eTN6-1Hs6DzSGMgsYPFC8xJIF4CsdQC8souGc9KhD3WHJM0ORzwedhCzXe1pCoOg4-v7kf0xQ1wu6DarnOvjv6pJ8osg";

    public function kegiatan($subzona)
    {
        $response = Http::withToken($this->token)->get("https://api-jakevo.jakarta.go.id/kbli/$subzona")->json();

        return $response['features'][0]['properties'];
    }

    public function skala($subzona, $kegiatan)
    {
        $response = Http::withToken($this->token)->get("https://api-jakevo.jakarta.go.id/kbli/$subzona/$kegiatan")->json();

        return $response['features'][0]['properties'];
    }

    public function kewenangan($subzona, $kegiatan, $skala)
    {
        $response = Http::withToken($this->token)->get("https://api-jakevo.jakarta.go.id/kbli/$subzona/$kegiatan/$skala")->json();

        return $response['features'][0]['properties'];
    }
}
