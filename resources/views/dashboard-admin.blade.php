@extends('tampilan.main-menu')

@section('title', 'Admin')

@section('konten')

Hello | {{Auth::user()->name}} <b>Selamat Datang </b> di Halaman Dashboard

<div class="row mt-4">
  <div class="col-lg-4">
    <div class="card-data buku">
      <div class="row">
        <div class="col-6"><i class="bi bi-book"></i></div>
        <div class="col-6 d-flex flex-column justify-content-center">
          <div class="card-desk">Buku</div>
          <div class="card-jml">{{$buku}}</div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-lg-4">
    <div class="card-data kategori">
      <div class="row">
        <div class="col-6"><i class="bi bi-list-columns"></i></div>
        <div class="col-6 d-flex flex-column justify-content-center">
          <div class="card-desk">Kategori</div>
          <div class="card-jml">{{$ktgr}}</div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-lg-4">
    <div class="card-data pengunjung">
      <div class="row">
        <div class="col-6"><i class="bi bi-person-lines-fill"></i></div>
        <div class="col-6 d-flex flex-column justify-content-center">
          <div class="card-desk">Pengunjung</div>
          <div class="card-jml">{{$user}}</div>
        </div>
      </div>
    </div>
  </div>

</div>


@endsection
