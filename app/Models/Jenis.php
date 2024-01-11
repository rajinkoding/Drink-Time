<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis extends Model
{
    use HasFactory;
    public $table = 'jenis';
    public $primaryKey = 'Id_jenis';
    public $incrementing = true;
    public $timestamps = false;
    public $fillable = ['Id_jenis', 'Nama'];

    public function selectAll() {
        return Jenis::get(); 
    }
    
    public function selectByIdJenis($cari) {
        return Jenis::where('Id_jenis', '=', $cari)
                        ->get();
    }

    public function insertnewJenis($idJenis, $nama) {
        $cek = Jenis::where('Nama', '=' ,$nama)->get();

        if (count($cek) == 0) {
        $baru = new Jenis();
        $baru->Id_jenis = $idJenis;
        $baru->Nama = $nama;
        $baru->save();
        return "Sukses";
        }
        else {
            return "Gagal";
        }
    }
}
