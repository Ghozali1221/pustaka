@extends('tampilan.main-menu')

@section('title', 'Delete Kategori')

@section('konten')

Hello <b> {{Auth::user()->name}} ||| </b> Selamat Datang di Halaman Hapus Data Buku


<div class="w-25">
  @if (session('status'))
  <div class="alert alert-success">
    {{ session('status') }}
  </div>
  @endif
</div>

<!-- {{$dataDelete}} -->

<div class="mt-3">
  <p>Anda Yakin Hapus Data <b>{{$dataDelete->judul}} ??? </b></p>
  <div>
    <a href="/destroy-buku/{{$dataDelete->slug}}" class="btn btn-info me-3">Yakin</a>
    <a href="/buku" class="btn btn-warning">Batal</a>
  </div>
</div>

@endsection
