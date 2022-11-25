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

    .sidebar{
        color: floralwhite;
    }
     
    .sidebar ul{
      list-style: none;
    }

    .sidebar li {
      padding: 20px;
    }

  .sidebar a {
    color: #ffffff;
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
            <div class="row h-100">
                <div class="sidebar sidebar-dark bg-dark bg-gradient col-2 ">
                    <ul>
                      @if (Auth::user()->role_id == 1)
                      <li>Dashboard</li>
                      <li>Pengajuan</li>
                      <li>About</li>
                      <li>logout</li>
                      @else
                      <li>profile</li>
                      <li>Pengajuan</li>
                      <li>Logout</li>
                      @endif
                    </ul>
                </div>
                <div class="content p-5 col-10">
                    @yield('content')
                </div>
            </div>
          </div>
    </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>