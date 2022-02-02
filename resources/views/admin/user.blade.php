@extends('layouts.template_admin')
@section('content')
    @php
    $Roles = '';
    @endphp
    <div class="container-fluid">


        {{-- Modal --}}
        <form action="{{ route('update-user') }}" method="POST">
            @csrf
            <div class="modal fade" id="modalEditUsers" tabindex="-1" role="dialog" aria-labelledby="modalEditUserLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <h5 class="modal-title text-white" id="modalEditUserLabel">Edit User</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <label class="font-weight-bold">Nama</label>
                            <input class="form-control" type="hidden" name="id" id="idUser">
                            <input class="form-control" name="name" type="text" placeholder="Masukan Nama User"
                                id="namaUser">
                            <label class="font-weight-bold mt-2">E-mail</label>
                            <input class="form-control" name="email" type="email" placeholder="Masukan Email User"
                                id="emailUser">
                            <label class="font-weight-bold mt-2">Role</label>
                            <select class="form-control" name="role" id="roleUser">
                                <option value="">Pilih..</option>
                                @foreach ($role as $r)
                                    <option value="{{ $r->name }}">{{ $r->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="modal-footer bg-primary">
                            <button type="submit" class="btn btn-success"><i class="fa fa-paper-plane"></i> Kirim</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <form action="{{ route('add-user') }}" method="POST">
            @csrf
            <div class="modal fade" id="modalAddUsers" tabindex="-1" role="dialog" aria-labelledby="modalEditAddLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <h5 class="modal-title text-white" id="modalEditAddLabel">Tambah User</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <label class="font-weight-bold">Nama</label>
                            <input class="form-control" name="name" type="text" placeholder="Masukan Nama User">
                            <label class="font-weight-bold mt-2">E-mail</label>
                            <input class="form-control" name="email" type="email" placeholder="Masukan Email User">
                            <label class="font-weight-bold mt-2">Password</label>
                            <input class="form-control" name="password" type="password"
                                placeholder="Masukan Password User">
                            <label class="font-weight-bold mt-2">Role</label>
                            <select class="form-control" name="role" <option value="">Pilih..</option>
                                @foreach ($role as $r)
                                    <option value="{{ $r->name }}">{{ $r->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="modal-footer bg-primary">
                            <button type="submit" class="btn btn-success"><i class="fa fa-paper-plane"></i> Kirim</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">User</h1>
            <a href="#" data-toggle="modal" data-target="#modalAddUsers"
                class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i
                    class="fas fa-plus fa-sm text-white-50"></i> Tambah User</a>
        </div>

        <!-- Content Row -->


        <!-- Content Row -->

        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-sm-12">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Data User</h6>

                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <table class="table table-striped" id="table-surveyer">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>E-mail</th>
                                    <th>Role</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user as $u)
                                    <tr>
                                        <td>{{ $u->name }}</td>
                                        <td>{{ $u->email }}</td>
                                        <td>
                                            @if (!empty($u->getRoleNames()))
                                                @foreach ($u->getRoleNames() as $role)
                                                    @php
                                                        $Roles = $role;
                                                    @endphp
                                                    <label class="badge badge-success">{{ $role }}</label>
                                                @endforeach
                                            @endif
                                        </td>
                                        <td><a class="btn btn-sm btn-primary"
                                                onclick="editUser({{ $u->id }}, '{{ $u->name }}', '{{ $u->email }}', '{{ $Roles }}')"
                                                data-toggle="modal" data-target="#modalEditUsers"><i class="fa fa-edit">
                                                </i></a>
                                            <form action="{{ route('delete-user') }}" class="d-inline"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="id" value="{{ $u->id }}">
                                                <button type="submit" class="btn btn-sm btn-danger"><i
                                                        class="fa fa-trash">
                                            </form>
                                            </i></a>
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
@endsection