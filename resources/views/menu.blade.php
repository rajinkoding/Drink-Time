@extends('template/layout1')

<link href="css/bootstrap.min.css" rel="stylesheet" />
<script src="js/bootstrap.min.js"></script>

@section('isilayout')
    <br />
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Menu</h4><br>
                    <form method="post" action="" enctype="multipart/form-data">
                        <h5>{{ session()->get('teks') }}</h5>
                        @csrf

                        <h6 class="card-title">Nama Makanan :
                        </h6>
                        <input type="text" required="required" name="nama" class="form-control" placeholder=" Jelly"
                            aria-label="Jelly" aria-describedby="basic-addon1"><br>
                        <h6 class="card-title">Id Jenis :
                        </h6>
                        <select class="form-control" name="idJenis">
                            @foreach ($datajenis as $row)
                                <option value='{{ $row->Id_jenis }}'>{{ $row->Nama }}</option>
                            @endforeach
                        </select><br>

                        <h6 class="card-title">Gambar Makanan :
                        </h6>
                        <input type="file" name="foto" class="form-control"
                            placeholder=" https://i2.wp.com/www.mediamaya.net/wp-content/uploads/2017/08/Pemandangan-Alam.jpg?resize=800%2C500"
                            aria-label="Foto" aria-describedby="basic-addon1"><br>
                        <h6 class="card-title">Harga :
                        </h6>
                        <input type="number" required="required" name="harga" class="form-control"
                            placeholder=" Rp. 1.000" aria-label="Harga" aria-describedby="basic-addon1"><br />
                        <h6 class="card-title">Flagjual :
                        </h6>
                        <input checked="checked" type="radio" name="flagjual"
                            value="1">&nbsp;&nbsp;&nbsp;Dijual&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="flagjual" value="0">&nbsp;&nbsp;&nbsp;Tidak Dijual<br><br>
                        <h6 class="card-title">Keterangan :
                        </h6>
                        <input type="text" required="required" name="keterangan" class="form-control"
                            placeholder="Penjelasan Menu" aria-label="Keterangan" aria-describedby="basic-addon1"><br>
                        <h6 class="card-title">Status :
                        </h6>
                        <select class="form-control" name="status">
                            <option value='aktif'>Aktif</option>
                            <option value='nonaktif'>Non Aktif</option>
                        </select><br>

                        <input type='submit' value='Add Menu' class='btn btn-primary'>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped">
                        @foreach ($datamenu as $row)
                            <tr>
                                <td>{{ $row->id_menu }}</td>
                                <td>
                                    <img class="card-img-top" src="{{ asset('fotomenu/' . $row->foto) }}"
                                        style="height: 100px; width: 100px;" alt="Card image cap">
                                    <strong>{{ $row->nama_menu }}</strong>
                                    Price: {{ $row->harga }}<br>
                                    {{ $row->keterangan }}
                                </td>
                            </tr>
                        @endforeach


                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
