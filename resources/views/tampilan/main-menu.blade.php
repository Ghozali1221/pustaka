<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Pustaka | @yield('title')</title>
 @notifyCss
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
 <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>

<body>

 <!-- start main -->
 <div class="main d-flex justify-content-between  flex-column">
  <nav class="navbar navbar-expand-lg" style="background-color: rgb(50, 205, 128);">
   <div class="container-fluid">
    <a class="navbar-brand" href="#">PERPUSTAKAAN KOTA</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
     <span class="navbar-toggler-icon"></span>
    </button>
   </div>
  </nav>

  <div class="body-konten h-100">
   <div class="row g-0 h-100">
    <div class="sidebar col-lg-2 p-4 collapse d-lg-block" id="navbarScroll">
     @if(Auth::user())
     @if (Auth::user()->role_id === 1)
     <a href="/" @if(request()->route()->uri == '/') class='active' @endif>Homepage</a>
     <a href="/dashboard-admin" @if(request()->route()->uri == 'dashboard-admin') class='active' @endif >Dashboard</a>
     <a href="/kategori" @if(request()->route()->uri == 'kategori' ||
      request()->route()->uri == 'tambah-kategori' ||
      request()->route()->uri == 'show-kategori-restore' ||
      request()->route()->uri == 'edit-kategori/{slug}' ||
      request()->route()->uri == 'del-kategori/{slug}')
      class='active' @endif >Kategori</a>

     <a href="/buku" @if(request()->route()->uri == 'buku' ||
      request()->route()->uri == 'add-buku' ||
      request()->route()->uri == 'buku-show/{slug}' ||
      request()->route()->uri == 'edit-buku/{slug}' ||
      request()->route()->uri == 'buku-restore' ||
      request()->route()->uri == 'hapus-buku/{slug}')
      class='active' @endif >Buku</a>

     <a href="/peminjaman-buku" @if(request()->route()->uri == 'peminjaman-buku')
      class='active' @endif> Peminjaman Buku</a>


     <a href="/pengembalian-buku" @if(request()->route()->uri == 'pengembalian-buku') class='active' @endif> Pengembalian Buku</a>

     <a href="/data-pengunjung" @if(request()->route()->uri == 'data-pengunjung' ||
      request()->route()->uri == 'user-non-aktif' ||
      request()->route()->uri == 'restore-user' ||
      request()->route()->uri == 'detail-user/{slug}')
      class='active' @endif >Pengunjung</a>

     <a href="/history" @if(request()->route()->uri == 'history') class='active' @endif >Log History</a>

     <a href="/logout">Keluar</a>

     @else(Auth::user()->role_id === 2)
     <a href="/" @if(request()->route()->uri == '/') class='active' @endif >Homepage</a>
     <a href="/pengunjung" @if(request()->route()->uri == 'pengunjung') class='active' @endif >Profil</a>
     <a href="/logout">Keluar</a>
     @endif
     @else
     <a href="/login">Login</a>
     @endif
    </div>

    <div class="konten p-4 col-lg-10">
     @yield('konten')
    </div>

   </div>
  </div>

 </div>
 <!-- end main -->

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
 <x-notify::notify />
 @notifyJs
</body>

</html>
