<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use App\Models\Jenis;
use App\Models\Users;
use App\Models\Bahan_makanan;
use App\Models\Detail_Menu;
use App\Models\Htrans;
use App\Models\Dtrans;
use App\Models\Menu;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function index()
    {
        $mn = new Menu();
        $param['datamenu'] = $mn->selectAll();
        return view('index', $param);
    }

    function laporan()
    {
        $htrans = new Htrans();
        if (Auth::guard("users_guard")->user()->role == "Admin") {
            $param['dataHtrans'] = $htrans->selectAll();
        }
        else {
            $param['dataHtrans'] = $htrans->selectByUsername(Auth::guard("users_guard")->user()->Username);
        }
        return view('laporan', $param);
    }

    function diproses(Request $req) {
        $htrans = new Htrans();
        $htrans->ubahstatus($req->id, "proses"); 
    }

    function dikirim(Request $req) {
        $htrans = new Htrans();
        $htrans->ubahstatus($req->id, "terkirim"); 
    }

    function ditolak(Request $req) {
        $htrans = new Htrans();
        $htrans->ubahstatus($req->id, "ditolak"); 
    }

    function diterima(Request $req) {
        $htrans = new Htrans();
        $htrans->ubahstatus($req->id, "diterima"); 
    }

    function lihatLaporan()
    {

    }

    function login()
    {
        return view('login');
    }

    function tekanlogin(Request $req)
    {
        $user = $req->username;
        $pass = $req->password;

        $credential = [
            'username' => $user,
            'password' => $pass
        ];

        if (Auth::guard("users_guard")->attempt($credential)) {
            if (Auth::guard("users_guard")->user()->role == "Admin") {
                return redirect("/menu");
            } else {
                return redirect("/");
            }
        } else {
            return redirect("login")->with("pesan", "User Gagal Login");
        }
    }

    function register()
    {
        return view('register');
    }

    function logout()
    {
        Auth::guard("users_guard")->logout();
        return redirect("/");
    }

    function tekanregister(Request $req)
    {
        $username = $req->username;
        $pass = $req->password;
        $email = $req->email;
        $name = $req->name;
        $alamat = $req->alamat;
        $kota = $req->kota;
        $telp = $req->telp;
        $tglLahir = $req->tgl_Lahir;
        $user = new Users();
        $hsl = $user->insertnewUser($username, $pass, $email, $name, $alamat, $kota, $telp, $tglLahir);

        if ($hsl == "sukses") {
            session()->flash("teks", "Registrasi Sukses");
            return view('register');
        } else {
            session()->flash("teks", "Username Sudah Terdaftar");
            return view('register');
        }
    }

    function menu()
    {
        $mn = new Menu();
        $jns = new Jenis();
        $param['datajenis'] = $jns->selectAll();
        $param['datamenu'] = $mn->selectAll();
        return view('menu', $param);
    }

    function cart()
    {
        return view('cart');
    }

    function addtocart($id)
    {
        $datacart = session()->has("cart") ? session()->get("cart") : [];
        $mn       = new Menu();
        $datamenu = $mn->selectByIdMenu($id);
        if (count($datamenu) > 0) {
            $temp = $datamenu[0];
            $temp->qty = 1;
            array_push($datacart, $temp);
            session()->put("cart", $datacart);
        }
        return redirect("/cart");
    }

    function removefromcart($index)
    {
        $datacart = session()->has("cart") ? session()->get("cart") : [];
        array_splice($datacart, $index, 1);
        session()->put("cart", $datacart);
        return redirect("/cart");
    }

    function tekanAddMenu(Request $req)
    {
        $idJenis    = $req->idJenis;
        $namaMenu   = $req->nama;
        $harga      = $req->harga;
        $status     = $req->status;
        $keterangan = $req->keterangan;
        $flagjual   = $req->flagjual;

        if ($req->hasFile('foto')) {
            $foto     = $req->file('foto');
            $namafile = $foto->getClientOriginalName();
            $foto->move("fotomenu", $namafile);
        } else {
            $namafile = "defaultmenu.jpg";
        }

        $menu = new Menu();
        $hsl = $menu->insertnewMenu($namaMenu, $idJenis, $namafile, $harga, $flagjual, $keterangan, $status);

        if ($hsl == "Sukses") {
            session()->flash("teks", "Nama Makanan Berhasil Dimasukan");
        } else {
            session()->flash("teks", "Nama Makanan Sudah Ada");
        }

        return redirect('menu');
    }

    function jenis()
    {
        $jns = new Jenis();
        $param['datajenis'] = $jns->selectAll();
        return view('jenis', $param);
    }

    function tekanAddJenis(Request $req)
    {

        $idJenis = $req->idJenis;
        $name = $req->nama;

        $jenis = new Jenis();
        $hsl = $jenis->insertnewJenis($idJenis, $name);

        if ($hsl == "Sukses") {
            session()->flash("teks", "Nama Jenis Berhasil Dimasukan");
        } else {
            session()->flash("teks", "Nama Jenis Sudah Ada");
        }

        return redirect('jenis');
        // menarik data jenis dari blade jenis lalu meamsukan nya ke table jenis di database lalu dicek apakah berhasil masuk atau belum
    }

    function processed(Request $req){

        $idhtrans = $req->id;
        $b = new Htrans;
        $b->processed($idhtrans);
        echo "sukses = ";
    }

    function tekanCheckOut(Request $req)
    {
        $id                 = 0;
        $tanggal            = date("Y-m-d");
        $username           = Auth::guard('users_guard')->user()->Username;
        $namaPenerima       = $req->Username;
        $kotaPengirim       = $req->kotaPengirim;
        $alamatPengirim     = $req->alamatPengirim;
        $noTeleponPengirim  = $req->noTeleponPengirim;
        $jenisPembayaran    = $req->jenisPembayaran;
        $status             = "pemesanan";

        $grandtotal         = 0;
        $datacart = session()->has("cart") ? session()->get("cart") : [];
        foreach ($datacart as $row) {
            $grandtotal+=($row->qty * $row->harga);
        }

        $ht                 = new Htrans();
        $idhtrans           = $ht->insertnewHtrans($id, $tanggal, $username, $namaPenerima, $kotaPengirim, $alamatPengirim, $noTeleponPengirim, $jenisPembayaran, $grandtotal, $status);

        foreach ($datacart as $row) {
            $dt             = new Dtrans();
            $dt->insertnewDtrans(0, $idhtrans, $row->id_menu, $row->qty, $row->harga);
        }

        return redirect('cart');

        // menarik data dari blade cart lalu meamsukan nya ke table htrans dan dtrans di database lalu dicek apakah berhasil masuk atau belum
    }
}
