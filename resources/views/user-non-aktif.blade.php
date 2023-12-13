@extends('tampilan.main-menu')

@section('title', 'Data Pengunjung')

@section('konten')

Hello | <b> {{Auth::user()->name}} </b> Selamat Datang di Halaman Data Pengunjung

<h5 class="my-3">Daftar Pengunjung (non-aktif)</h5>

<div class="my-2">
  <a href="/data-pengunjung" class="btn btn-outline-success">Kembali</a>
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
        <th>Nama</th>
        <th>Telepon</th>
        <th>Alamat</th>
        <th>Status</th>
        <th>Proses</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($newData as $d)
      <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$d->name}}</td>
        <td>{{$d->telephone}}</td>
        <td>{{$d->alamat}}</td>
        <td>{{$d->status}}</td>
        <td>
        <a href="/aktifkan-user/{{$d->slug}}" class="btn btn-primary">aktifkan</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection
