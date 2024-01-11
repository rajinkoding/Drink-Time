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
                    <h4 class="card-title">Login</h4><br>
                    <form method="post" action="">
                        <h5>{{ session()->get('pesan') }}</h5>
                        @csrf

                        <h6 class="card-title">Username : </h6>
                        <input type="text" name="username" class="form-control" placeholder="Jonathan" aria-label="Username" aria-describedby="basic-addon1"><br>
                        <h6 class="card-title">Password : </h6>
                        <input type="password" name="password" class="form-control" placeholder="jonathan" aria-label="Password" aria-describedby="basic-addon1"><br>

                        <input type='submit' value='Login User' class='btn btn-primary'>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-3">
        </div>
    </div>
@endsection
