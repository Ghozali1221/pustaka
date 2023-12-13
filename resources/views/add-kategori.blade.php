@extends('tampilan.main-menu')

@section('title', 'Add Data')

@section('konten')

Hello | <b> {{Auth::user()->name}} </b> Selamat Datang di Halaman Tambah Kategori

<h5 class="my-3">Tambah Data Kategori</h5>

@if ($errors->any())
<div class="alert alert-danger w-50">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="w-25">
    <form action="proses-kategori" method="post">
        @csrf
        <div>
            <label for="name" class="form-label">Nama Kategori</label>
            <input type="text" id="name" name="name" class="form-control " autocomplete="off" autofocus>
        </div>

        <div class="mt-4 justify-content">
            <button type="submit" class="btn btn-outline-warning me-4">Simpan</button>
            <a href="/kategori" class="btn btn-info ">Kembali</a>
        </div>

    </form>
</div>

@endsection
