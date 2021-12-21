<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class KBLIPusdatin extends Controller
{
    public $token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI5M2JmYzJiMS0yYjY3LTRjM2MtYjE2Mi1kOTZiNGRkYTM3YWEiLCJqdGkiOiI1NTEyYWY4NWY2ZjIwYzA5Y2M3ODllNGZiNTQ2YTM2OTYyNWQ4YTMyODVkMWExNGY3YmQ2NWQ5ODQ1ZTBlNGI3YjYzZmU5ZjAzNjhhZjcxZCIsImlhdCI6MTYzOTEwNzc0OC4xNzY3MDksIm5iZiI6MTYzOTEwNzc0OC4xNzY3MTMsImV4cCI6MTY3MDY0Mzc0OC4xNzI5MjYsInN1YiI6IiIsInNjb3BlcyI6W119.XXBu1ZqTkIvC37Fcvrm2QAuIrUUHzaDl1oQ9squsvfdKKPNia3aWYQC2Do9hDxa8Kc758cOdF72JK1LVl66Z6ZCT0pHsGv4I0p0jKQSRkGzhNb5HBEm9xHUCEOv8EsMX9xfg4Mpwt-lD0E4ukOcQokZNNVhTE4LtgYwJBJN29MGV31Ll4xbA9Vfypa7ZBL3AdhyzyHLwNY8R31wqUOr0r39tkcmvfd_G8oqKkztmozeGMhQSmZajkHSejM0pOjfOtD8Tm_dzHG81w2oksQbBgqSegTN2UAatLno40HCYO3uv169lMmA36spLE6PhoeMLxUQeM3MvYYRbT4GgAl5i-5bJO9eKL46Gbhvg2Pe3pKSOUJXVCUS9cMQiaLN_GFYKloUly9Z9qb4dbicsfG86oFjOlaP3XPZ_Uw_LilaAL-RmCEjOCfXVPBlwApaaUjffzzefA8p-076Cjp2z4iuVbHyD3csgq6nkH1tcaEiCsoQMfgkXumOr3mcm8gKXP5xFZnCAYlHMZhEkakHMr9PIpqGcMuk_TaAnOGPVCYfPwodoBGQc1_OJDzVUX-IBp6r6cHTcP5sMXLtyS09h93AU1nuF0xxYpq-dtGb_MJGDsk06gWqjJ2ZvUZr2l3hz85Vt-HI8sLWfPkVhJmnIN8GBwPySl0VC9-caOK89lWM0_Lg";

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
