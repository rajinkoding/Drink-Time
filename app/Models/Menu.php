<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    public $table = 'menu';
    public $primaryKey = 'id_menu';
    public $incrementing = true;
    public $timestamps = false;
    public $fillable = ['id_menu', 'nama_menu', 'Id_jenis', 'Foto', 'harga', 'flagjual', 'keterangan', 'status'];

    public function selectAll() {
        return Menu::get();
    }

    public function selectByIdMenu($cari) {
        return Menu::where('id_menu', '=', $cari)
                        ->get();
    }

    public function insertnewMenu($namaMenu, $idJenis, $foto, $harga, $flagjual, $keterangan, $status) {
        $cek = Menu::where('nama_menu', '=' ,$namaMenu)->get();

        if (count($cek) == 0) {
            $baru = new Menu();
            $baru->id_menu = 0;
            $baru->id_jenis = $idJenis;
            $baru->nama_menu = $namaMenu;
            $baru->foto = $foto;
            $baru->harga = $harga;
            $baru->status = $status;
            $baru->flagjual = $flagjual;
            $baru->keterangan = $keterangan;
            $baru->save();
            return "Sukses";
        }
        else {
            return "Gagal";
        }
    }
}