@extends('tampilan.main-menu')

@section('title', 'Kategori Buku')

@section('konten')

Hello | <b> {{Auth::user()->name}} </b> Selamat Datang di Halaman Kategori

<h5 class="my-3">Daftar Kategori</h5>

<div class="my-4 justify-content-center">
 <a href="" class="btn btn-info me-5">Tambah Data</a>
 <a href="show-kategori-restore" class="btn btn-outline-primary">Restore Data</a>
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
    <th>Kategori</th>
    <th>Opsi</th>
   </tr>
  </thead>
  <tbody>
   @foreach ($kategori as $k)
   <tr>
    <td>{{$loop->iteration}}</td>
    <td>{{$k->name}}</td>
    <td>
     <a href="edit-kategori/{{$k->slug}}">Edit</a>
     <a href="del-kategori/{{$k->slug}}">Delete</a>
    </td>
   </tr>
   @endforeach
  </tbody>
 </table>

</div>

@endsection
