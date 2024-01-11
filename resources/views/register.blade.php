@extends('template/layout1')

@section('judullayout')
    <h1>Login</h1>
    <h4>Login For More Access</h4>
@endsection

<link href="css/bootstrap.min.css" rel="stylesheet" />
<script src="js/bootstrap.min.js"></script>

@section('isilayout')
    <br />
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Register</h4><br>
                    <form method="post" action="">
                        <h5>{{ session()->get('teks') }}</h5>
                        @csrf

                        <h6 class="card-title">Username : </h6>
                        <input required type="text" name="username" class="form-control" placeholder="Jonathan"
                            aria-label="Username" aria-describedby="basic-addon1"><br>
                        <h6 class="card-title">Password : </h6>
                        <input required type="password" name="password" class="form-control" placeholder="jonathan"
                            aria-label="Password" aria-describedby="basic-addon1"><br>
                        <h6 class="card-title">Email : </h6>
                        <input required type="email" name="email" class="form-control" placeholder="jonatansianturi@gmail.com"
                            aria-label="Email" aria-describedby="basic-addon1"><br>
                        <h6 class="card-title">Name : </h6>
                        <input required type="text" name="name" class="form-control" placeholder="Jonathan Sianturi"
                            aria-label="Name" aria-describedby="basic-addon1"><br>
                        <h6 class="card-title">Alamat : </h6>
                        <input required type="text" name="alamat" class="form-control" placeholder="Rungkut Mapan Tengah 5 "
                            aria-label="Alamat" aria-describedby="basic-addon1"><br>
                        <h6 class="card-title">Kota : </h6>
                        <input required type="text" name="kota" class="form-control" placeholder="Surabaya" aria-label="Kota"
                            aria-describedby="basic-addon1"><br>
                        <h6 class="card-title">Telepon : </h6>
                        <input required type="number" name="telp" class="form-control" placeholder="081233168169"
                            aria-label="Telepon" aria-describedby="basic-addon1"><br>
                        <h6 class="card-title">Tanggal Lahir : </h6>
                        <input required type="date" name="tgl_Lahir" class="form-control" placeholder="10-01-2002"
                            aria-label="Tanggal Lahir" aria-describedby="basic-addon1"><br>
                        <input type='submit' value='Add User' class='btn btn-primary'>
                    </form>
                </div>
            </div>


        </div>
        <div class="col-md-3">
        </div>
    </div>
    </div>
@endsection