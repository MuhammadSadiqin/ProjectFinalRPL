<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>SIASM | @yield('title')</title>
  {{-- <link rel="stylesheet" href="{{asset('css/style.css')}}"> --}}

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<style>
    .main{
        height: 100vh;
    }


  .sidebar a {
    color: #ffffff;
    text-decoration: none;
    display: block;
    padding: 25px 10px;
  }

  .sidebar a:hover{
    background: black;
  }


</style>
<body>

    <div class="main d-flex flex-column justify-content-between">
        <nav class="navbar navbar-dark bg-dark bg-gradient">
            <div class="container-fluid">
                <a class="navbar-brand" href="dashboard ">
                    <img src="{{asset('assets/logo.png')}}" alt="" width="30" height="24" class="d-inline-block align-text-top">
                    SIASM
                  </a>
              <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
              </form>
            </div>
          </nav>

          <div class="body-content h-100">
            <div class="row g-0 h-100">
                <div class="sidebar sidebar-dark bg-dark bg-gradient col-lg-2 ">
                      @if (Auth::user()->role_id == 1)
                      <a href="dashboard">Dashboard</a>
                      <a href="pengajuan">Pengajuan</a>
                      <a href="">About</a>
                      <a href="logout">Logout</a>
                      @else
                      <a href="profile">Profile</a>
                      <a href="">Pengajuan</a>
                      <a href="logout">Logout</a>
                      @endif
                </div>
                <div class="content p-5 col-lg-10">
                    @yield('content')
                </div>
            </div>
          </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
    <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>