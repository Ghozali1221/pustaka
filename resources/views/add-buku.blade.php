@extends('tampilan.main-menu')

@section('title', 'Add Data')

@section('konten')

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

Hello | <b> {{Auth::user()->name}} </b> Selamat Datang di Halaman Tambah Buku

<h5 class="my-2">Tambah Data Buku</h5>

<div class="w-25">
  @if (session('status'))
  <div class="alert alert-success">
    {{ session('status') }}
  </div>
  @endif
</div>

<div class="w-25">
  @if (session('error'))
  <div class="alert alert-danger">
    {{ session('error') }}
  </div>
  @endif
</div>

<div class="w-25">
 <form action="proses_add_buku" method="post" enctype="multipart/form-data">
  @csrf
  <div class="my-4">
   <label for="kode_buku" class="form-label">Kode Buku</label>
   <input type="text" id="kode_buku" name="kode_buku" class="form-control " value="{{ old('kode_buku') }}" autocomplete="off" required autofocus>
  </div>

  <div class="my-4">
   <label for="judul" class="form-label">Judul Buku</label>
   <input type="text" id="judul" name="judul" class="form-control " value="{{ old('judul') }}" autocomplete="off" required>
  </div>

  <div>
   <label for="categori" class="form-label me-3 mb-2">Kategori</label>
   <select name="categories[]" id="categori" class="form-control select-multiple" multiple="multiple" aria-placeholder="pilih kategori">
    @foreach ( $dataKtgr as $ktgr )
    <option value="{{$ktgr->id}}">{{$ktgr->name}}</option>
    @endforeach
   </select>
  </div>

  <div class="my-4">
   <label for="image" class="form-label">Gambar</label>
   <input type="file" id="image" name="image" class="form-control">
  </div>
  <div>
   <p class="badge bg-success text-start">Ukuran gambar maksimal 2 MB <br>Ekstensi : jpg,jpeg dan png</p>
  </div>

  <div class="mt-4 justify-content">
   <button type="submit" class="btn btn-info me-4">Simpan</button>
   <a href="/buku" class="btn btn-outline-info ">Kembali</a>
  </div>

 </form>
</div>


<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
 // In your Javascript (external .js resource or <script> tag)
 $(document).ready(function() {
  $('.select-multiple').select2();
 });
</script>
@endsection
