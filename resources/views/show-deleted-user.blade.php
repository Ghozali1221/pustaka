@extends('tampilan.main-menu')

@section('title', 'Deleted Data User')

@section('konten')

Hello | <b> {{Auth::user()->name}} </b> Selamat Datang di Halaman Restore Data User

<div>
 <a href="/data-pengunjung" class="btn btn-outline-primary mt-4">kembali</a>
</div>
{{$dataRecycle}}
<div class="my-4">
 <table class="table table-bordered text-center">
  <thead>
   <tr>
    <th>No</th>
    <th>Name</th>
    <th>Telephone</th>
    <th>Status</th>
    <th>Opsi</th>
   </tr>
  </thead>
  <tbody>
   @foreach ($dataRecycle as $k)
   <tr>
    <td>{{$loop->iteration}}</td>
    <td>{{$k->name}}</td>
    <td>{{$k->telephone}}</td>
    <td>{{$k->status}}</td>
    <td>
     <a href="restore-data-user/{{$k->slug}}">Restore</a>
     <a href="permanent-deleted/{{$k->slug}}">Permanent Delete</a>
    </td>
   </tr>
   @endforeach
  </tbody>
 </table>
</div>

@endsection
