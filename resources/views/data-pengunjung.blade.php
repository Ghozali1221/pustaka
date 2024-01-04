@extends('tampilan.main-menu')

@section('title', 'Data Pengunjung')

@section('konten')

Hello | <b> {{Auth::user()->name}} </b> Selamat Datang di Halaman Data Pengunjung

<h5 class="my-3">Daftar Pengunjung</h5>

<div class="my-4 justify-content-center">
 <a href="user-non-aktif" class="btn btn-warning me-5">User Non-aktif</a>
 <a href="restore-user" class="btn btn-outline-warning">Restore Data User </a>
</div>


<div class="w-50">
 @if (session('status'))
 <div class="alert alert-success">
  {{ session('status') }}
 </div>
 @endif
</div>

<div class="my-4 col-lg-12">
 <table class="table table-bordered text-center">
  <thead class="table-secondary border-primary">
   <tr>
    <th>No</th>
    <th>Nama</th>
    <th>Telepon</th>
    <th>Alamat</th>
    <th>Status</th>
    <th>Opsi</th>
   </tr>
  </thead>
  <tbody>
   @foreach ($dataUser as $u)
   <tr>
    <td>{{$loop->iteration}}</td>
    <td>{{$u->name}}</td>
    <td>
     @if($u->telephone)
     {{$u->telephone}}
     @else
     123456
     @endif
    </td>
    <td>{{$u->alamat}}</td>
    <td>{{$u->status}}</td>
    <td>
     <a href="/detail-user/{{$u->slug}}">Detail</a>
    </td>
   </tr>
   @endforeach
  </tbody>
 </table>
</div>
@endsection
