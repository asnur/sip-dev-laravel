@extends('layout.maintemp')
@section('poi')

    <!-- Content -->
    <div class="container margin_conten_permenu">

        <p class="card-title mt-2 text-center font-weight-bold judul_utama">Akses</p>
        <div class="form-group w-100 mt-3 mb-0 ml-3" id="radiusSlide">
            <label class="font-weight-bold font_range_input" for="formControlRange">Radius</label>
            <label class="font-weight-bold font_range_input" id="OutputControlRange">0 Km</label>

            <input type="range" style="height: 6px;" class="form-control-range" id="ControlRange"
                min="500" max="3000" step="500" value="1000">
        </div>
        <br>
        <div class="accordion tabListFasilitas" id="PoiCollabse">

            {{-- <div class="row row_mid_judul2">
                <div class="col-md-12 flex-column">
                    <button type="button"
                        class="btn btn-md btn-block text-left text_all text_poi1 tombol_search"
                        data-toggle="collapse" data-target="#collapsePoiOne" aria-expanded="true"
                        aria-controls="collapsePoiOne">
                        <b class="text_all_mobile">Minimarket</b>
                    </button>
                </div>
            </div>

            <div id="collapsePoiOne" class="collapse show" aria-labelledby="headingOne"
                data-parent="#PoiCollabse">
                <div class="card-body text_poi2 row_mid_judul">
                    <ul class="list-group list-group-flush PoiCollabse_mobile">

                        <li
                            class="listgroup-cust d-flex justify-content-between align-items-center text_all">
                            Alfamidi Siaga
                            <span class="PoiCollabse_konten_mobile">0.185 km</span>
                        </li>

                        <li
                            class="listgroup-cust d-flex justify-content-between align-items-center text_all">
                            Familymart Pejaten
                            <span class="PoiCollabse_konten_mobile">0.575 km</span>
                        </li>

                        <li
                            class="listgroup-cust d-flex justify-content-between align-items-center text_all">
                            Alfamart Siaga Raya
                            <span class="PoiCollabse_konten_mobile">0.641 km</span>
                        </li>

                        <li
                            class="listgroup-cust d-flex justify-content-between align-items-center text_all">
                            Alfamidi Sawo Manilla
                            <span class="PoiCollabse_konten_mobile">0.715 km</span>
                        </li>

                    </ul>
                </div>
            </div> --}}
        </div>


    </div>





    @endsection