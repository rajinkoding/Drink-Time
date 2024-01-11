<?php

namespace App\Models;

use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Authenticatable

{
    use HasFactory;
    public $table = 'users';
    public $primaryKey = 'Username';
    public $incrementing = false;
    public $timestamps = true;
    public $fillable = ['Username', 'password', 'email', 'Nama', 'Alamat', 'Kota', 'telp', 'tgllahir', 'tgljoin', 'role', 'status', 'updated_at', 'created_at'];

    public function selectByUsername($cari)
    {
        return Users::where('Username', '=', $cari)
            ->get();
    }

    public function insertnewUser($username, $password, $email, $nama, $alamat, $kota, $telp, $tgllahir)
    {
        $cek = Users::where('Username', '=', $username)->get();

        if(count($cek) == 0) {
            $baru = new Users();
            $baru->Username = $username;
            $baru->password = Hash::make($password);
            $baru->email = $email;
            $baru->nama = $nama;
            $baru->alamat = $alamat;
            $baru->kota = $kota;
            $baru->telp = $telp;
            $baru->tgllahir = $tgllahir;
            $baru->tgljoin = date("Y-m-d"); // Corrected date format
            $baru->role = "User";
            $baru->status = "Aktif";
            $baru->save();
            return "sukses";
        }
        else { return "double"; }
    }

}
