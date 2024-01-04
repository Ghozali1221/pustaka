@extends('tampilan.main-menu')

@section('title', 'Kategori Buku')

@section('konten')

Hello | <b> {{Auth::user()->name}} </b> Selamat Datang di Halaman Kategori

<h5 class="my-3">Daftar Kategori</h5>

<div class="my-4 justify-content-center">

 <!-- Button trigger modal -->
 <button type="button" class="btn btn-primary me-4" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  Tambah Data
 </button>

 <!-- Modal -->
 <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
   <div class="modal-content">
    <div class="modal-header">
     <h3 class="modal-title fs-5" id="staticBackdropLabel">Tambah Kategori</h3>
     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
     <div class="w-25">
      <form action="proses-kategori" method="post">
       @csrf
       <div>
        <label for="name" class="form-label">Nama Kategori</label>
        <input type="text" id="name" name="name" class="form-control " autocomplete="off" autofocus>
       </div>

       <div class="mt-4 d-flex flex-wrap justify-content">
        <button type="submit" class="btn btn-outline-warning me-4">Simpan</button>
       </div>

      </form>
     </div>
    </div>
    <div class="modal-footer">
     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    </div>
   </div>
  </div>
 </div>

 <a href="show-kategori-restore" class="btn btn-outline-primary">Restore Data</a>
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

{{$kategori->links()}}

</div>
@endsection
