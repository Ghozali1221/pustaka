@extends('tampilan.main-menu')
@section('title', 'Proses Peminjaman Buku')
@section('konten')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<div class="col-6 w-50">
 Hello | <b>SELAMAT DATANG </b>
 <h4 class="my-3">FORM PENGEMBALIAN BUKU</h4>
 <form action="proses-pengembalian-buku" method="post">
  @csrf
  <div class="my-3">
   <label for="user_id" class="form-label">User</label>
   <select name="user_id" id="user_id" class="form-control pilihData">
    <option value="">Pilih User</option>
    @foreach ($dataUser as $u)
    <option value="{{$u->id}}">{{$u->name}}</option>
    @endforeach
   </select>
  </div>

  <div class="my-3">
   <label for="book_id" class="form-label">Buku</label>
   <select name="book_id" id="book_id" class="form-control pilihData">
    <option value="">Pilih Kode dan Buku</option>
    @foreach ($dataBuku as $b)
    <option value="{{$b->id}}">{{$b->kode_buku}} - {{$b->judul}}</option>
    @endforeach
   </select>
  </div>

  <div>
   <button class="btn btn-primary me-3 w-100" type="submit">Proses</button>
  </div>

 </form>

 <div class="mt-3">
  @if(session('pesan'))
  <div class="alert {{session('status')}}">
   {{session('pesan')}}
  </div>
  @endif
 </div>

</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
 $(document).ready(function() {
  $('.pilihData').select2();
 });
</script>
@endsection
