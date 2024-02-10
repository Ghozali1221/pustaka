<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Register | PT:SGI</title>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<style>
 .main-menu {
  height: 100vh;
  box-sizing: border-box;
 }

 /* .register-box {
  width: 500px;
  border: 3px dotted #34675C;
  padding: 35px;
 } */

 form div {
  margin-bottom: 20px;
 }
</style>

<body>
 <div class="main-menu d-flex flex-column justify-content-center align-items-center">
  <h5 class="mt-4">. . : FORM REGISTER : . .</h5>

  @if (session('status'))
  <div class="alert alert-success">
   {{ session('pesan') }}
  </div>
  @endif

  @if ($errors->any())
  <div class="alert alert-danger" style="inline-size: 500px;">
   <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
   </ul>
  </div>
  @endif

  <div class="container w-50">
   <form action="" method="post">
    @csrf
    <div>
     <label for="name" class="form-label">Username</label>
     <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" autocomplete="off" autofocus>
    </div>

    <div>
     <label for="password" class="form-label">Password</label>
     <input type="password" name="password" id="password" class="form-control">
    </div>

    <div>
     <label for="telephone" class="form-label">Telephone</label>
     <input type="number" name="telephone" id="telephone" class="form-control" value="{{ old('telephone') }}" autocomplete="off">
    </div>

    <div>
     <label for="email" class="form-label">Email</label>
     <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" autocomplete="off">
    </div>
    <div>

     <div>
      <label for="alamat" class="form-label">Alamat</label>
      <textarea name="alamat" id="alamat" class="form-control" value="{{ old('alamat') }}"></textarea>
     </div>

     <button type="submit" class="btn btn-success form-control">Register</button>
    </div>

    <div class="text-center">
     <p>or</p>
    </div>

    <div class="text-center">
     Sudah Punya Akun, silahkan <a href="login">Login</a>
    </div>

   </form>
  </div>
 </div>

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>