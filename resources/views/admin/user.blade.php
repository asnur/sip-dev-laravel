@extends('layouts.template_admin')
@section('content')

@php
$Roles = '';
@endphp

<div class="container-xl">
    <!-- Page title -->
    <div class="page-header d-print-none">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    User
                </h2>
            </div>
            <!-- Page title actions -->
            <div class="col-12 col-md-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modalAddUsers">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <line x1="12" y1="5" x2="12" y2="19"></line>
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                        </svg>
                        Tambah User
                    </a>
                    <a href="#" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal" data-bs-target="#modal-report" aria-label="Create new report">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <line x1="12" y1="5" x2="12" y2="19"></line>
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- modal add --}}
    <form action="{{ route('add-user') }}" method="POST">

        @csrf
        <div class="modal modal-blur fade" id="modalAddUsers" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="modalEditAddLabel">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">

                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalEditAddLabel">Tambah User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 col-xl-12">

                                <div class="mb-3">
                                    <label class="form-label">Nama</label>
                                    <input type="text" class="form-control" name="name" placeholder="Masukan Nama User">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">E-mail</label>
                                    <input type="email" class="form-control" name="email" placeholder="Masukan Email User">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Password</label>
                                    <input type="password" class="form-control" name="password" placeholder="Masukan Password User">
                                </div>

                                <div class="mb-3">
                                    <div class="form-label">Penempatan</div>
                                    <select class="form-select" name="role" required>
                                        <option value="">Pilih..</option>
                                        @foreach ($role as $r)
                                        <option value="{{ $r->name }}">{{ $r->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn me-auto" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Kirim</button>
                    </div>
                </div>


            </div>
        </div>
    </form>


    {{-- modal update --}}
    <form action="{{ route('update-user') }}" method="POST">
        @csrf
        <div class="modal modal-blur fade" id="modalEditUsers" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="modalEditUserLabel">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">

                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalEditUserLabel">Edit User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 col-xl-12">

                                <div class="mb-3">
                                    <label class="form-label">Nama</label>
                                    <input type="hidden" class="form-control" name="id" id="idUser">
                                    <input type="text" class="form-control" name="name" id="namaUser" placeholder="Masukan Nama User">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">E-mail</label>
                                    <input class="form-control" name="email" type="email" placeholder="Masukan Email User" id="emailUser">
                                </div>

                                <div class="mb-3">
                                    <div class="form-label">Role</div>
                                    <select class="form-select" name="role" id="roleUser" required>
                                        <option value="">Pilih..</option>
                                        @foreach ($role as $r)
                                        <option value="{{ $r->name }}">{{ $r->name }}</option>
                                        @endforeach

                                    </select>

                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn me-auto" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Kirim</button>

                    </div>
                </div>


            </div>


        </div>
    </form>






</div>

<div class="page-body">
    <div class="container-xl">
        <!-- konten disini -->

        <div class="row row-cards">
            <div class="col-md-12 col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data User</h3>
                    </div>

                    <div class="card-body">
                        <table class="display table table-striped" id="table-surveyer">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>E-mail</th>
                                    <th>Role</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user as $x)
                                <tr>
                                    <td>{{ $x->name }}</td>
                                    <td>{{ $x->email }}</td>
                                    <td>
                                        @if (!empty($x->getRoleNames()))
                                        @foreach ($x->getRoleNames() as $role)
                                        @php
                                        $Roles = $role;
                                        @endphp
                                        <span class="badge bg-green-lt">{{ $role }}</span>
                                        @endforeach
                                        @endif
                                    </td>
                                    <td>
                                        <div class="row row-cards">
                                            <div class="col-md-6 col-xl-6">
                                                <a class="btn btn-tabler w-100 btn-icon" aria-label="Google" data-bs-toggle="modal" data-bs-target="#modalEditUsers" onclick="editUser({{ $x->id }}, '{{ $x->name }}', '{{ $x->email }}', '{{ $Roles }}')">

                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            </div>

                                            <div class="col-md-6 col-xl-6">
                                                <form action="{{ route('delete-user') }}" class="d-inline" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="hidden" name="id" value="{{ $x->id }}">
                                                    <button type="submit" class="btn btn-google w-100 btn-icon" aria-label="Tabler">

                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>


    </div>
</div>


@endsection
