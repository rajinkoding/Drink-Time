@extends('template/layout1')

@section('isilayout')
    <br><br>
    {{-- nampilkan data dari table Htrans --}}
    <table class="table table-striped'>" @foreach ($dataHtrans as $row)
        <tr>
            <td>
                Nota : {{ $row->id }}
                <br>
                <h1 class="card-title" style='color: black;'><strong>{{ strtoupper($row->username) }}</strong></h4>
                    <h6 class="card-title" style='color: black;'>{{ $row->alamat_pengirim }}, {{ $row->kota_pengirim }}</h4>
                        <h6 class="card-title" style='color: black;'>{{ $row->no_telepon_pengirim }}</h6>
                        <h6 class="card-title" style="color: blue; font-weight: bold; text-align: right">Tanggal :
                            {{ $row->tanggal }}</h6>
                        @if (Auth::guard('users_guard')->user()->role == 'Admin')
                            @if ($row->status == 'pemesanan')
                                <button class='btn btn-sm btn-danger' id="diProses"
                                    onclick="isProcessed({{ $row->id }})">Diproses</button>
                                <button class='btn btn-sm btn-danger' id="diTolak"
                                    onclick="isDitolak({{ $row->id }})">Ditolak</button>
                                <button class='btn btn-sm btn-danger' id="diKirim"
                                    onclick="isDikirim({{ $row->id }})" disabled>Dikirim</button>
                            @elseif($row->status == 'proses')
                                <button class='btn btn-sm btn-danger' id="diProses"
                                    onclick="isProcessed({{ $row->id }})" disabled>Diproses</button>
                                <button class='btn btn-sm btn-danger' id="diTolak"
                                    onclick="isDitolak({{ $row->id }})" disabled>Ditolak</button>
                                <button class='btn btn-sm btn-danger' id="diKirim"
                                    onclick="isDikirim({{ $row->id }})">Dikirim</button>
                            @endif
                        @else
                            @if ($row->status == 'terkirim')
                                <button class='btn btn-sm btn-danger' id="diTerima"
                                    onclick="isTerima({{ $row->id }})">Diterima</button>
                            @endif
                        @endif
            </td>
            <td align="center">
                <h3 class="card-title" style='color: black;'>{{ strtoupper($row->jenis_pembayaran) }}</h3>
            </td>
            <td align="right">
                <h3 class="card-title" style='color: black;'>Rp. {{ number_format($row->grandtotal) }}</h3>
            </td>
            <td align="center">
                <h4 class="card-title" style='color: black;'>{{ strtoupper($row->status) }}</h4>
            </td>
        </tr>
        @endforeach
    </table>
    {{-- nampilkan data dari table Htrans --}}

    <script src="http://code.jquery.com/jquery.js"></script>
    <script language='javascript'>
        var myurl = "<?php echo URL::to('/'); ?>";

        function isProcessed(id) {
            $.get(myurl + "/diproses", {
                    id: id
                },
                function(result) {
                    window.location = myurl + "/laporan";
                }
            );
        }

        function isDikirim(id) {
            $.get(myurl + "/dikirim", {
                    id: id
                },
                function(result) {
                    window.location = myurl + "/laporan";
                }
            );
        }

        function isDitolak(id) {
            $.get(myurl + "/ditolak", {
                    id: id
                },
                function(result) {
                    window.location = myurl + "/laporan";
                }
            );
        }

        function isTerima(id) {
            $.get(myurl + "/diterima", {
                    id: id
                },
                function(result) {
                    window.location = myurl + "/laporan";
                }
            );
        }
    </script>
@endsection
