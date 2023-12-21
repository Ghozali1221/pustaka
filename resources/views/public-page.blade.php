@extends('tampilan.main-menu')
@section('title', 'List Buku')
@section('konten')

Hello | <b> Selamat Datang </b>
<h5 class="mt-4 text-bold">Daftar Buku</h5>



<div class="my-4">
  <div class="row ">
    @foreach ($buku as $b)
    <div class="col-lg-3 col-md-4 mb-4">
      <div class="card h-100">
        <img src="{{ $b->cover != null ? asset('storage/upload/' . $b->cover) : asset('images/book.jpg') }}" class="card-img-top" draggable="false" width="90px" height="170px">
        <div class="card-body">
          <h5 class="card-title">{{$b->kode_buku}}</h5>
          <p class="card-text my-1">{{$b->judul}}</p>
          <p class="card-text {{$b->status == 'tersedia' ? 'text-primary' : 'text-danger'}}">
            {{$b->status}}
          </p>
          <a href="/login" class="btn btn-success">Pinjam</a>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>

@endsection
