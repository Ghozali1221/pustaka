@extends('tampilan.main-menu')
@section('title', 'List Buku')
@section('konten')

Hello | <b>{{Auth::user()->name}} </b> Selamat Datang di Halaman Buku

<h5 class="mt-4 text-bold">Daftar Buku</h5>

<div class="my-4 justify-content-center">
 <a href="add-buku" class="btn btn-success me-5">Tambah Data</a>
 <a href="buku-restore" class="btn btn-outline-primary">Restore Data</a>
</div>

<div class="my-3 col-4 col-md-6 col-sm-11">
 <form action="" method="get">
  <div class="input-group mb-3 ">
   <input type="text" class="form-control" name="pencarian" placeholder="ketikkan kata pencarian" autofocus autocomplete="off">
   <button class="btn btn-outline-primary">Search</button>
  </div>
 </form>
</div>

<div class="w-75">
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
    <th>Kode Buku</th>
    <th>Judul Buku</th>
    <th>Cover</th>
    <th>Kategori</th>
    <th>Status</th>
    <th>Opsi</th>
   </tr>
  </thead>
  <tbody>
   @foreach ( $buku as $b)
   <tr>
    <td>{{$loop->iteration}}</td>
    <td>{{$b->kode_buku}}</td>
    <td>{{$b->judul}}</td>
    <td>
     <img src="{{ $b->cover != null ? asset('storage/upload/' . $b->cover) : asset('images/book.jpg') }}" class="img-thumbnail" draggable="false" width="100px" height="auto">
    </td>

    <td>
     @foreach ( $b->categories as $c )
     {{$c->name}}
     @endforeach
    </td>

    <td>{{$b->status}}</td>

    <td>
     <a href="/edit-buku/{{$b->slug}}">Edit</a>
     <a href="/hapus-buku/{{$b->slug}}">Delete</a>
    </td>
   </tr>
   @endforeach
  </tbody>
 </table>

 {{$buku->links()}}

</div>

@endsection