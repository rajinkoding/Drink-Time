<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Htrans extends Model
{
    use HasFactory;
    public $table = 'htrans';
    public $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;
    public $fillable = ['id', 'tanggal', 'username', 'nama_penerima', 'kota_pengirim', 'alamat_pengirim', 'no_telepon_pengirim', 'jenis_pembayaran', 'grandtotal', 'status'];

    public function ubahstatus($id, $status) {
        $dt = Htrans::find($id); 
        $dt->status = $status; 
        $dt->save(); 
    }

    public function selectAll() {
        return Htrans::get();
    }

    public function selectByUsername($username) {
        return Htrans::where('username', '=', $username)->get();
    }

    public function processed($idhtrans) {
        Htrans::where('id', '=', $idhtrans)
            ->update(['status'=> 'Processed']);
    }

    public function insertnewHtrans($id, $tanggal, $username, $namaPenerima, $kotaPengirim, $alamatPengirim, $noTeleponPengirim, $jenisPembayaran, $grandtotal, $status)
    {

        $baru = new Htrans();
        $baru->id               = $id;
        $baru->tanggal          = $tanggal;
        $baru->username         = $username;
        $baru->nama_penerima    = $namaPenerima;
        $baru->kota_pengirim    = $kotaPengirim;
        $baru->alamat_pengirim  = $alamatPengirim;
        $baru->no_telepon_pengirim = $noTeleponPengirim;
        $baru->jenis_pembayaran = $jenisPembayaran;
        $baru->grandtotal       = $grandtotal;
        $baru->status           = $status;
        $baru->save();

        return $baru->id;
    }
}
