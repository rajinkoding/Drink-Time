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
    @php $datacart = session()->has("cart") ? session()->get("cart") : []; @endphp
    <div class="col-md-12">
        <form method="post" action="">
            <table class='table table-striped'>
                @php $index = 0; @endphp
                @php $subtot = 0; @endphp
                {{-- Menampilkan data Cart --}}
                    @foreach ($datacart as $row)
                        <tr>
                            <td width='15%'><img class="card-img-top" src="{{ asset('fotomenu/' . $row->foto) }}"
                                    style="height: 100px;" alt="Card image cap"></td>
                            <td>
                                <h5 class="card-title">{{ $row->nama_menu }}</h5>
                                <h6 class="card-title" style='text-align: justify;'>{{ $row->keterangan }}</h6><br /><a
                                    href="{!! url('removefromcart/' . $index) !!}" class="btn btn-primary btn-sm">Remove From Cart</a>
                            </td>
                            <td align='center' width='15%'>
                                <h4 class="card-title" style='color: black;'>{{ $row->qty }}</h4>
                            </td>
                            <td align='right' width='15%'>
                                <h4 class="card-title" style='color: black;'>Rp. {{ $row->harga }},-</h4>
                            </td>
                            <td align='right' width='15%'>
                                <h4 class="card-title" style='color: black;'>Rp. {{ $row->harga * $row->qty }},-</h4>
                            </td>
                        </tr>
                        @php $subtot+=($row->qty * $row->harga); @endphp
                        @php $index+=1; @endphp
                    @endforeach
                    {{-- Menampilkan data Cart --}}
                    {{-- inputan siapa Penerima --}}
                    <tr>
                        <td colspan='3'>
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Informasi Pengiriman </h4>
                                    <h5>{{ session()->get('pesan') }}</h5>
                                    @csrf

                                    <h6 class="card-title">Username : </h6>
                                    <input type="text" name="namaPenerima" class="form-control" placeholder="Jonathan"
                                    aria-label="Username" aria-describedby="basic-addon1" value="{{ Auth::guard('users_guard')->user()->Username }}"><br>
                                    <h6 class="card-title">Kota Pengirim : </h6>
                                    <input type="text" name="kotaPengirim" class="form-control" placeholder="jonathan"
                                    aria-label=" Kota Pengirim " aria-describedby="basic-addon1" value="{{ Auth::guard('users_guard')->user()->Kota }}"><br>
                                    <h6 class="card-title">Alamat Pengirim : </h6>
                                    <input type="text" name="alamatPengirim" class="form-control" placeholder="jonathan"
                                    aria-label="Alamat Pengirim" aria-describedby="basic-addon1"  value="{{ Auth::guard('users_guard')->user()->Alamat }}"><br>
                                    <h6 class="card-title">No Telepon Pengirim : </h6>
                                    <input type="text" name="noTeleponPengirim" class="form-control"
                                    placeholder="jonathan" aria-label="No Telepon Pengirim"
                                    aria-describedby="basic-addon1"  value="{{ Auth::guard('users_guard')->user()->telp }}"><br>
                                    <h6 class="card-title">Jenis Pembayaran : </h6>
                                    <select name="jenisPembayaran" id="cars" class="form-control"
                                    aria-label="Jenis Pembayaran" aria-describedby="basic-addon1">
                                    <option value="volvo">Ovo</option>
                                    <option value="saab">Gopay</option>
                                    <option value="mercedes">Shoppee Pay</option>
                                </select>
                            </div>
                        </div>
                    </td>
                    <td align='right' colspan='2'>
                        <h4 class="card-title" style='color: black;'>Subtotal :&nbsp;&nbsp;&nbsp;&nbsp;Rp. {{ $subtot }},-</h4>
                        <br><br>
                        <input type='submit' value='Checkout Pesanan' class='btn btn-lg btn-primary'>
                    </td>
                </tr>
                {{-- inputan siapa Penerima --}}
            </table>
            </form>
        </div>
    </div>
@endsection
