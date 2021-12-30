<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Jakpintas</title>
  </head>
  <body>


    <div class="container">



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
                        <a class="btn btn-primary" href="{{ url('create_admin') }}">Tambah</a>
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
    </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>