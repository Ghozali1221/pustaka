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
 <div class="mb-3">
  <label for="" class="form-label">Username</label>
  <input type="text" class="form-control" readonly value="{{$dataDetail->name}}">
 </div>

 <div class="mb-3">
  <label for="" class="form-label">Telephone</label>
  <input type="text" class="form-control" readonly value="{{$dataDetail->telephone}}">
 </div>

 <div class="mb-3">
  <label for="" class="form-label">Alamat</label>
  <input type="text" class="form-control" cols="25" rows="10" readonly value="{{$dataDetail->alamat}}" style="resize: none;">
 </div>
</div>

<div class="mt-3">
 <h5 class="mb-3">History Peminjaman</h5>
 <x-history-table :dataHistory='$dataHistory' />
</div>

@endsection
