@extends('template/layout1')

@section('judullayout')
    <h1>Home</h1>
    <h4>Ini Subjudul untuk bagian Home</h4>
@endsection

<link href="css/bootstrap.min.css" rel="stylesheet" />
<script src="js/bootstrap.min.js"></script>

@section('isilayout')
    <br />
    <div class="row">
        @foreach ($datamenu as $row)
            <div class="col-md-4">
                <div class="card">
                    <img class="card-img-top" src="{{ asset("fotomenu/".$row->foto)}}" style="height: 250px;" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{ $row->nama_menu }}</h5>
                        <h6 class="card-title" style='color: red;'>Rp. {{ number_format($row->harga) }}</h6>
                        <p class="card-text" style="text-align: justify;">{{ $row->keterangan }}</p>
                        <a href="{!! url('addtocart/'.$row->id_menu); !!}" class="btn btn-primary">Add To Cart</a>
                    </div>
                </div>
                <br/>
            </div>
        @endforeach
    </div>
@endsection
