@extends('tampilan.main-menu')

@section('title', 'Detail Pengunjung')

@section('konten')

Hello | <b> {{Auth::user()->name}} </b> Selamat Datang di Halaman Detail Pengunjung

<h5 class="my-3">Detail User</h5>

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

<div class="my-4 w-25">
    <div class="card text-center">
        <div class="card-header">
            <img src="{{ $dataHistory->book->cover != null ? asset('storage/upload/' . $dataHistory->book->cover) : asset('images/book.jpg') }}" draggable="false" height="50px">
        </div>
        <div class="card-body">
            <h5 class="card-title"> Judul Buku : {{$dataHistory->book->judul}}</h5>
        </div>
        <div class="card-footer text-muted">
            Peminjaman : {{$dataHistory->rent_date}}
        </div>
    </div>
</div>

@endsection
