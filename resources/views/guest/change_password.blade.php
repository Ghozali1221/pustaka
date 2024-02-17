<!doctype html>
<html lang="en">

<head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <title>Change Password</title>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
 <h1 class="text-center mt-3">Form Change Password</h1>

 <div class="container text-center w-25">
  @if (session('error'))
  <div class="alert alert-danger">
   {{ session('error') }}
  </div>
  @endif
 </div>

 <div class="container flex d-flex justify-content-center">
  <form action="process_change_pass" method="post">
   @csrf
   <div class="my-3">
    <label class="form-label" for="OldPass">Old Password</label>
    <input class="form-control form-control-sm" type="password" id="OldPass" name="OldPass" autofocus required>
   </div>
   <div class="my-3">
    <label class="form-label" for="NewPass">New Password</label>
    <input class="form-control form-control-sm" type="password" id="NewPass" name="NewPass" required>
   </div>
   <div class="my-3">
    <label class="form-label" for="ConfirmPass">Confirm Password</label>
    <input class="form-control form-control-sm" type="password" id="ConfirmPass" name="ConfirmPass" required>
    <div id="ConfirmHelp" class="form-text">Make sure the password you entered is the same</div>
   </div>

   <div class="mt-2 d-grid gap-2 d-md-block">
    <button class="btn btn-primary btn-sm" type="submit">Process</button>
    <a href="/" class="btn btn-success btn-sm" type="button">Homepage</a>
   </div>
  </form>
 </div>

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>