@extends('layout.maintemp')
@section('poi')

    <!-- Content -->
    <div class="container margin_conten_permenu">

        <div class="accordion" id="PoiCollabse">
            <div class="row row_mid_judul2">
                <div class="col-md-12 flex-column">
                    <button type="button"
                        class="btn btn-md btn-block text-left text_all_permenu text_poi1 tombol_search"
                        data-toggle="collapse" data-target="#collapsePoiOne" aria-expanded="true"
                        aria-controls="collapsePoiOne">
                        <b class="text_all_mobile_permenu_poi">Minimarket</b>
                    </button>
                </div>
            </div>


            <div id="collapsePoiOne" class="collapse show" aria-labelledby="headingOne" data-parent="#PoiCollabse">
                <div class="card-body text_poi2 row_mid_judul">
                    <ul class="list-group list-group-flush PoiCollabse_mobile">

                        <li class="listgroup-cust d-flex justify-content-between align-items-center text_all_permenu">
                            Alfamidi Siaga
                            <span class="PoiCollabse_konten_mobile">0.185 km</span>
                        </li>

                        <li class="listgroup-cust d-flex justify-content-between align-items-center text_all_permenu">
                            Familymart Pejaten
                            <span class="PoiCollabse_konten_mobile">0.575 km</span>
                        </li>

                        <li class="listgroup-cust d-flex justify-content-between align-items-center text_all_permenu">
                            Alfamart Siaga Raya
                            <span class="PoiCollabse_konten_mobile">0.641 km</span>
                        </li>

                        <li class="listgroup-cust d-flex justify-content-between align-items-center text_all_permenu">
                            Alfamidi Sawo Manilla
                            <span class="PoiCollabse_konten_mobile">0.715 km</span>
                        </li>

                    </ul>
                </div>
            </div>

            <div class="row row_mid_judul">
                <div class="col-md-12 flex-column">
                    <button type="button"
                        class="btn btn-md btn-block text-left text_all_permenu text_poi1 tombol_search"
                        data-toggle="collapse" data-target="#collapsePoiTwo" aria-expanded="true"
                        aria-controls="collapsePoiTwo">
                        <b class="text_all_mobile_permenu_poi">Sekolah</b>
                    </button>
                </div>
            </div>

            <div id="collapsePoiTwo" class="collapse show" aria-labelledby="headingOne" data-parent="#PoiCollabse">
                <div class="card-body text_poi2 row_mid_judul">
                    <ul class="list-group list-group-flush PoiCollabse_mobile">

                        <li class="listgroup-cust d-flex justify-content-between align-items-center text_all_permenu">
                            SMP Siaga
                            <span class="PoiCollabse_konten_mobile">0.185 km</span>
                        </li>

                        <li class="listgroup-cust d-flex justify-content-between align-items-center text_all_permenu">
                            SMP Pejaten
                            <span class="PoiCollabse_konten_mobile">0.575 km</span>
                        </li>

                        <li class="listgroup-cust d-flex justify-content-between align-items-center text_all_permenu">
                            SMA Siaga Raya
                            <span class="PoiCollabse_konten_mobile">0.641 km</span>
                        </li>

                        <li class="listgroup-cust d-flex justify-content-between align-items-center text_all_permenu">
                            SMA Sawo Manilla
                            <span class="PoiCollabse_konten_mobile">0.715 km</span>
                        </li>

                    </ul>
                </div>
            </div>

            <div class="row row_mid_judul">
                <div class="col-md-12 flex-column">
                    <button type="button"
                        class="btn btn-md btn-block text-left text_all_permenu text_poi1 tombol_search"
                        data-toggle="collapse" data-target="#collapsePoiThre" aria-expanded="true"
                        aria-controls="collapsePoiThre">
                        <b class="text_all_mobile_permenu_poi">Hotel</b>
                    </button>
                </div>
            </div>

            <div id="collapsePoiThre" class="collapse show" aria-labelledby="headingOne" data-parent="#PoiCollabse">
                <div class="card-body text_poi2 row_mid_judul">
                    <ul class="list-group list-group-flush PoiCollabse_mobile">

                        <li class="listgroup-cust d-flex justify-content-between align-items-center text_all_permenu">
                            Wisma Siaga
                            <span class="PoiCollabse_konten_mobile">0.185 km</span>
                        </li>

                        <li class="listgroup-cust d-flex justify-content-between align-items-center text_all_permenu">
                            Hotel Pejaten
                            <span class="PoiCollabse_konten_mobile">0.575 km</span>
                        </li>

                        <li class="listgroup-cust d-flex justify-content-between align-items-center text_all_permenu">
                            Hotel Siaga Raya
                            <span class="PoiCollabse_konten_mobile">0.641 km</span>
                        </li>

                        <li class="listgroup-cust d-flex justify-content-between align-items-center text_all_permenu">
                            Wisma Sawo Manilla
                            <span class="PoiCollabse_konten_mobile">0.715 km</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>


    </div>



    @endsection