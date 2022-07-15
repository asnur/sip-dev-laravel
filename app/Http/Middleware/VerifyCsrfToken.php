<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        '/saveDataPin',
        '/saveEditDataPin',
        '/editDataPin',
        '/deleteDataPin',
        '/detailDataPin',
        '/saveUser',
        '/deleteImage',
        '/save_image',
        '/save_wilayah',
        '/save_kordinat',
        '/save_eksisting',
        '/save_njop',
        '/save_bpn',
        '/save_chart_pie',
        '/save_chart_bar',
        '/save_sanitasi',
        '/save_turun',
        '/save_air_tanah',
        '/save_zoning',
        '/save_ketentuan_tpz',
        '/save_ketentuan_khusus',
        '/save_poi',
        '/save_kbli',
        '/check_print',
        '/save_itbx',
        '/saveDataSurvey',
        '/editDataSurvey',
        '/saveEditDataSurvey',
        '/deleteDataSurvey',
        '/detailDataSurvey',
        '/deleteImageSurvey',
        '/importSurvey',
        '/savePendataanUsaha',
        '/getPendataanUsaha',
        '/deletePendataanUsaha',
        '/deleteImageUsaha',
        '/file_kuesioner',
    ];
}
