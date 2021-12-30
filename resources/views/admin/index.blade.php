<div style="padding:5%;" class="new_login">
    <div class="dropdown">

        <img src="/profile/{{ Auth::user()->id }}.jpg"
            style="border-radius: 50%; width:36px;  height:36px;" id="btnLogout"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">


            <div class="dropdown-menu dropdown-menu-right mt-1 p-1" aria-labelledby="btnLogout"
            style="min-width: 73px; position: absolute; margin-left:-30px;">
            <a class="dropdown-item p-0 text-center" href="#" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();" style="font-size: 12px"><i
                    class="fa fa-sign-out"></i> Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                class="d-none">
                @csrf
            </form>
        </div>



    </div>
</div>


<div class="card card-default">
    <div class="card-header">
        <form class="form-inline">
            <div class="form-group mr-1">
                <input class="form-control" type="text" name="q" value="" placeholder="Pencarian..." />
            </div>
            <div class="form-group mr-1">
                <button class="btn btn-success">Refresh</button>
            </div>
            <div class="form-group mr-1">
                <a class="btn btn-primary" href="">Tambah</a>
            </div>
        </form>
    </div>
    <div class="card-body p-0 table-responsive">
        <table class="table table-bordered table-striped table-hover mb-0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Pemilik Usaha</th>
                    <th>Koordinat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <?php $no = 1 ?>
            <tr>
                <td></td>
                <td></td>
                <td></td>

                <td>
                    <a class="btn btn-sm btn-warning" href="">Ubah</a>
                    <a class="btn btn-sm btn-info" href="">Detail</a>
                    <form method="POST" action="" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus Data?')">Hapus</button>
                    </form>
                </td>
            </tr>
        </table>
    </div>
</div>