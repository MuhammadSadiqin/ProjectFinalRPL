<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Siasm | Register</title>
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>

  <div class="main d-flex justify-content-center align-items-center">
      <div class="container">
      <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
          <div class="card border-0 shadow rounded-3 my-5">
            <div class="card-body p-4 p-sm-5">
              @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif

              @if (session('status'))
                <div class="alert alert-success">
                    {{ session('massage') }}
                </div>
              @endif
              <div class="register-box">
                {{-- <div class="logo">
                  <img src="{{asset('assets/logo.png')}}" alt="">
              </div> --}}
                <form action="" method="POST">
                  @csrf
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username" >
                    <label for="username">Username</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                    <label for="floatingPassword">Password</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="nim" name="nim" placeholder="nim" required>
                    <label for="nim">NIM</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="jurusan" name="jurusan" placeholder="Jurusan" required>
                    <label for="nim">Jurusan</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="prodi" name="prodi" placeholder="Prodi" required>
                    <label for="nim">Prodi</label>
                  </div>
    
                  <div class="d-grid">
                    <button class="btn btn-primary btn-login text-uppercase fw-bold" type="submit">Sign Up</button>
                  </div>
                  <div class="text-center">
                  you already have account? <a href="login">login
                  </a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
 


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>