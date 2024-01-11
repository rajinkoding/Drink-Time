@extends('template/layout1')

<link href="css/bootstrap.min.css" rel="stylesheet" />
<script src="js/bootstrap.min.js"></script>

@section('isilayout')
    <br />
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Jenis</h4><br>
                    <form method="post" action="">
                        <h5>{{ session()->get('teks') }}</h5>
                        @csrf

                        <h6 class="card-title">ID Jenis : </h6>
                        <input type="text" name="idjenis" class="form-control" readonly="readonly" aria-label="Username" aria-describedby="basic-addon1"><br>
                        <h6 class="card-title">Nama Jenis : </h6>
                        <input type="text" name="namajenis" class="form-control" placeholder="Boba" aria-label="Password" required aria-describedby="basic-addon1"><br>

                        <input type='submit' value='Simpan Data' class='btn btn-primary'>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped">
                        @foreach($datajenis as $row)
                            <tr>
                                <td>{{ $row->Id_jenis }} </td>
                                <td>{{ $row->Nama }} </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
        {{-- <div class="col-md-2"></div>
        <div class="col-md-6">
            <form method="post" action="">
                <h5>{{ session()->get('teks') }}</h5>
                @csrf
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Id Jenis : </span>
                    </div>
                    <input type="text" name="idJenis" class="form-control" placeholder="idJenis " aria-label="idJenis"
                        aria-describedby="basic-addon1">
                </div>
                <br />
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Nama : </span>
                    </div>
                    <input type="text" name="nama" class="form-control" placeholder=" nama" aria-label="nama"
                        aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <input type="submit" class="btn btn-primary" value="Add Jenis" />
                    </div>
                </div>
            </form>
        </div> --}}
    </div>
    </div>
@endsection
