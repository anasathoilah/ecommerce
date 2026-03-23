<!doctype html>
<html lang="en">
  <head>
    <title>Belanja.aja @yield('title')</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('public/style.css') }}">
  </head>
  <body >
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 py-3 d-flex bg-primary justify-content-between">
                <!-- Form Search -->
                <form class="form-inline">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            <ul class="nav justify-content-end bg-primary">
            <li class="nav-item bg-primary">
                <a class="nav-link active" href="#">Keranjang</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Notifikasi</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Buka Toko</a>
            </li>
            <li class="nav-item">
                <div class="dropdown float-right">
                <button class="btn btn-primary dropdown-toggle" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                            User
                        </button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="triggerId">
                    <a class="dropdown-item" href="#">
                        <div class="media">
                            <a class="d-flex align-self-center" href="#" height="50" width="50"> 
                                <img src="" alt="">
                            </a>
                            <div class="media-body">
                                <h5 class="mt-0">@include('layout.name')</h5>
                                <small><p><i class="bi bi-clock"></i>time</p></small>
                            </div>
                        </div>
                    </a>
                    <a class="dropdown-item" href="#"><i class="bi bi-gear-fill"></i>Setting</a>
                    <a class="dropdown-item" href="/logout"><i class="bi bi-box-arrow-left"></i>Logout</a>
                </div>
            </div> 
            </li>
            </ul>
        </div>
        </div>
    </div>

    <div class="row">
        <!-- membuat navs -->
        <div class="col-lg-2 mt-4">
         <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link"  href="{{ route('home') }}" role="tab">Home</a>
            <!-- ini penggunaan template inheritance -->
            <a class="nav-link" href="{{ route('login') }}" role="tab" >Login</a>
            <a class="nav-link" href="{{ route('register') }}" role="tab" >Daftar</a>
            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
            <a class="nav-link" href="{{ route('products.index') }}" role="tab" > Daftar Produk</a>
        </div>
    </div>

    <div class="card-body">
           <!-- Redirect habis logout -->
                @if(session('success'))
                  <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                    <!-- Content Article -->
                     @yield('content')
    </div>
           

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>