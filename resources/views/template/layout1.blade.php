<link href="css/bootstrap.min.css" rel="stylesheet" />
<script src="js/bootstrap.min.js"></script>

<body style="background-color: #4DCDCA;">
    <div class="row">
        <div class="col-md-12">
            <nav class="navbar navbar-expand-lg" style="background-color: #F1EE92;">
                <a class="navbar-brand" href="/">DrinkTime</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span></button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        @if (Auth::guard('users_guard')->check())
                            @if (Auth::guard('users_guard')->user()->role == "Admin") 
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('jenis') }}">Data Jenis</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('menu') }}">Data Menu</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('laporan') }}">Laporan</a>
                                </li>
                            @else 
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('cart') }}">Cart</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('laporan') }}">Laporan</a>
                                </li>
                            @endif
                        @endif
                    </ul>

                    @if (Auth::guard('users_guard')->check())
                        <form class="form-inline my-2 my-lg-0">
                            <a href='/profile'><button class="btn btn-outline-success my-2 my-sm-0"
                                    type="button">Welcome,
                                    {{ Auth::guard('users_guard')->user()->Username }}</button></a>&nbsp;
                            <a href='/logout'><button class="btn btn-outline-success my-2 my-sm-0"
                                    type="button">Logout</button></a>
                        </form>
                    @else
                        <form class="form-inline my-2 my-lg-0">
                            <a href="/login"><button class="btn btn-outline-success my-2 my-sm-0"
                                    type="button">Login</button></a>&nbsp;
                            <a href="/register"><button class="btn btn-outline-success my-2 my-sm-0"
                                    type="button">Register</button></a>
                        </form>
                    @endif
                </div>
            </nav>
        </div>
    </div>

    <div class="container">

        @yield('isilayout')

        <br /><br />

        {{-- <footer class=" w-100 bg-info text-center mt-3 p-2">
            @yield('footer')
        </footer> --}}
    </div>
</body>
