@extends('layouts.template_admin')
@section('content')


{{-- modal update --}}
<form action="{{ route('update-pegawai') }}" method="POST">
    @csrf
    @method('PUT')
    <div class="modal modal-blur fade" id="modalEditUsers" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="modalEditUserLabel">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditUserLabel">Edit Pegawai</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 col-xl-12">

                            <div class="mb-3">
                                <label class="form-label">Nama</label>
                                <input type="hidden" class="form-control" name="id" id="idUser">
                                <input type="text" class="form-control" value="{{ $datapegawai->name }}" name="name" id="namaUser" placeholder="Masukan Nama User">


                            </div>

                            <div class="mb-3">
                                <label class="form-label">E-mail</label>
                                <input class="form-control" name="email" type="email" placeholder="Masukan Email User" id="emailUser">
                            </div>

                            <div class="mb-3">
                                <div class="form-label">Penempatan</div>
                                <select class="form-select" name="penempatan" id="penempatanUser" required>


                                    {{-- <option id="penempatanUser"></option> --}}

                                    {{-- @foreach ($kecamatan as $kec)
                                        <option value="{{ $kec }}">{{ $kec }}</option>
                                    @endforeach --}}

                                </select>

                            </div>

                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn me-auto btn-primary" data-bs-dismiss="modal">Kirim</button>
                    <button type="button" class="btn" data-bs-dismiss="modal">Batal</button>
                </div>
            </div>


        </div>


    </div>
</form>

@endsection
