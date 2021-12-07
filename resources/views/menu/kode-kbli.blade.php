@extends('layout.maintemp')
@section('kode_kbli')

       <!-- Content -->
       <div class="container margin_conten_permenu">

        <div class="d-flex ml-1">
            <div class="col-md-5 text_all_permenu">
                <label class="text_all_mobile_permenu">Cari berdasarkan</label>
            </div>
            <div class="col-md-7 text_all_permenu cari_kodekbli cari_kodekbli_mobile">

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1"
                        value="option1" checked>
                    <label class="form-check-label " for="exampleRadios1">
                        Kegiatan
                    </label>
                </div>
                <div class="form-check margin_cari_kodelbli_mobile">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2"
                        value="option2">
                    <label class="form-check-label margin_cari_kodelbli_mobile" for="exampleRadios2">
                        Lokasi
                    </label>
                </div>
            </div>
        </div>

        <div class="d-flex ml-1">
            <div class="col-md-4 text_all_permenu">
                <label class="text_all_mobile_permenu">Kegiatan</label>
            </div>
            <div class="col-md-7 text_all ml-5">
                <textarea name="" id="" cols="23" rows="2"></textarea>
            </div>
        </div>

        <div class="d-flex ml-1">
            <div class="col-md-4 text_all_permenu">
                <label class="text_all_mobile_permenu">Sektor</label>
            </div>
            <div class="col-md-7 text_all ml-5">
                <textarea name="" id="" cols="23" rows="2"></textarea>
            </div>
        </div>


        <div class="d-flex ml-1 margin_cari_kodelbli_mobile">
            <div class="col-md-4 text_all_permenu">
                <label class="text_all_mobile_permenu">Lokasi Usaha</label>
            </div>
            <div class="col-md-7">
                <div class="form-group input-group-sm cari_kodekbli_option_mobile">
                    <select class="form-control ml-2">
                        <option>Skala1</option>
                        <option>Skala2</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="d-flex ml-1 skala_kodekbli margin_cari_kodelbli_mobile">
            <div class="col-md-4 text_all_permenu">
                <label class="text_all_mobile_permenu">Skala Usaha</label>
            </div>
            <div class="col-md-7">
                <div class="form-group input-group-sm cari_kodekbli_option_mobile">
                    <select class="form-control ml-2">
                        <option>Skala1</option>
                        <option>Skala2</option>
                    </select>
                </div>
            </div>
        </div>

        <table style="margin:0;" class="table table-borderless mt-4 table_kbli">
            <thead>
                <tr>
                    <th class="text_all_permenu text-center" style="width:30%;">Kode KBLI</th>
                    <th class="text_all_permenu text-center">Kegiatan</th>
                    <th class="text_all_permenu text-center">Resiko</th>
                    <th class="text_all_permenu text-center">ITBX</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="text_all_permenu text-center" style="width:30%;">13472</td>
                    <td class="text_all_permenu text-center">Perdagangan Kue Basah</td>
                    <td class="text_all_permenu text-center">Menengah</td>
                    <td class="text_all_permenu text-center">Bersyarat</td>

                </tr>
            </tbody>
        </table>



    </div>


    @endsection