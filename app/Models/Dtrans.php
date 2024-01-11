<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dtrans extends Model
{
    use HasFactory;
    public $table = 'dtrans';
    public $primaryKey = 'id';
    public $incrementing = false;
    public $timestamps = false;
    public $fillable = ['id', 'id_htrans', 'id_menu', 'qty', 'harga'];

    public function insertnewDtrans($id, $idHtrans, $idMenu, $qty, $harga) {

        $baru            = new Dtrans();
        $baru->id        = $id;
        $baru->id_htrans = $idHtrans;
        $baru->id_menu   = $idMenu;
        $baru->qty       = $qty;
        $baru->harga     = $harga;
        $baru->save();
    }
}
