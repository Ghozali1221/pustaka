@extends('tampilan.main-menu')

@section('title', 'Edit Data')

@section('konten')

Hello | <b> {{Auth::user()->name}} </b> Selamat Datang di Halaman Edit Kategori

<h5 class="my-3">Edit Data Kategori</h5>

@if ($errors->any())
<div class="alert alert-danger w-50">
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif

<!-- {{$dataKtgr}} -->
<div class="w-25">
  <form action="/proses-edit-ktgr/{{$dataKtgr->slug}}" method="post">
    @csrf
    @method('put')
    <div>
      <label for="name" class="form-label">Nama Kategori</label>
      <input type="text" id="name" name="name" class="form-control " value="{{$dataKtgr->name}}" autocomplete="off" autofocus>
    </div>

    <div class="mt-2 justify-content">
      <button type="submit" class="btn btn-outline-warning me-4">Simpan</button>
      <a href="/kategori" class="btn btn-info">Kembali</a>
    </div>

  </form>
</div>

@endsection
