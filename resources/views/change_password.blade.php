<!doctype html>
<html lang="en">

<head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <title>Form Change Password</title>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>

 <h1 class="my-3 text-center">Form Change Password</h1>
 <div class="container flex d-flex justify-content-center">
  <form action="proses_change_password" method="post">
   @csrf
   <div class="my-3">
    <label for=" OldPass" class="form-label">Old Password</label>
    <input type="password" class="form-control" id="OldPass" name="OldPass" autofocus>
   </div>
   <div class="my-3">
    <label for="NewPass" class="form-label">New Password</label>
    <input type="password" class="form-control" id="NewPass" name="NewPass">
   </div>
   <div class="my-3">
    <label for="ConfirmPass" class="form-label">Confirm Password</label>
    <input type="password" class="form-control" id="ConfirmPass" name="ConfirmPass">
   </div>

   <div class="d-grid gap-2 d-md-block mt-3">
    <button class="btn btn-info btn-sm" type="submit">Process</button>
    <a class="btn btn-primary btn-sm" href="/" type="button">Homepage</a>
   </div>

  </form>
 </div>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>