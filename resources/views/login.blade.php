<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Login | PT.SGI</title>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<style>
 .main-menu {
  block-size: 100vh;
  box-sizing: border-box;
 }

 .login-box {
  inline-size: 500px;
  border: 1px solid #FFDF00;
  padding: 35px;
 }

 form div {
  margin-block-end: 20px;
 }
</style>

<body>

 <div class="main-menu d-flex flex-column justify-content-center align-items-center">
  <h5>. . : FORM LOGIN : . .</h5>
  @if (session('status'))
  <div class="alert alert-danger">
   {{ session('pesan') }}
  </div>
  @endif

  <div class="login-box">
   <form action="" method="post">
    @csrf
    <div>
     <label for="name" class="form-label">Username</label>
     <input type="text" name="name" id="name" class="form-control" autocomplete="off" autofocus required>
    </div>

    <div>
     <label for="email" class="form-label">Email</label>
     <input type="email" name="email" id="email" class="form-control" autocomplete="off" required>
    </div>

    <div>
     <label for="password" class="form-label">Password</label>
     <input type="password" name="password" id="password" class="form-control" required>
    </div>

    <div>
     <button type="submit" class="btn btn-primary form-control">Login</button>
    </div>

    <div class="text-center">
     <p>or</p>
    </div>

    <div class="text-center">
     Belum Punya Akun , silahkan <a href="register">Register</a>
    </div>

   </form>
  </div>
 </div>

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>