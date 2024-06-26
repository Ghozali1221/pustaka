@extends('tampilan.main-menu')

@section('title', 'Detail Pengunjung')

@section('konten')

Hello | <b> {{Auth::user()->name}} </b> Selamat Datang di Halaman Detail Pengunjung

<p class="my-3">Detail User : <b>{{$dataDetail->slug}}</b> </p>

<div class="my-2">
 <a href="/deleted-user/{{$dataDetail->slug}}" class="btn btn-danger me-3"> Deleted User</a>
 <a href="/data-pengunjung" class="btn btn-outline-success">Kembali</a>
</div>

<div class="w-50">
 @if (session('status'))
 <div class="alert alert-success">
  {{ session('status') }}
 </div>
 @endif
</div>
<div class="my-4">
 <table class="table table-bordered text-center">
  <thead class="table-secondary border-primary">
   <tr>
    <th>No</th>
    <th>Gambar</th>
    <th>Kode Buku</th>
    <th>Judul</th>
    <th>Tgl Peminjaman Buku</th>
    <th>Tgl Pengembalian Buku</th>
   </tr>
  </thead>
  <tbody>
   @foreach ($dataHistory as $h)
   <tr>
    <td>{{$loop->iteration}}</td>
    <td>
     <img src="{{ $h->book->cover != null ? asset('storage/upload/' . $h->book->cover) : asset('images/book.jpg') }}" draggable="false" width="40px" height="60px">
    </td>
    <td>{{$h->book->kode_buku}}</td>
    <td>{{$h->book->judul}}</td>
    <td>{{$h->rent_date}}</td>
    <td>{{$h->fix_return_date}}</td>
   </tr>
   @endforeach
  </tbody>

  @endsection
