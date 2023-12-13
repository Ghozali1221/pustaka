@extends('tampilan.main-menu')

@section('title', 'Deleted Data')

@section('konten')

Hello | <b> {{Auth::user()->name}} </b> Selamat Datang di Halaman Deleted Data Buku

<div>
<a href="/buku" class="btn btn-outline-primary mt-4">kembali</a>
</div>

<div class="my-4">
  <table class="table table-bordered text-center">
    <thead>
      <tr>
        <th>No</th>
        <th>Kode Buku</th>
        <th>Judul Buku</th>
        <th>Opsi</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($data as $k)
      <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$k->kode_buku}}</td>
        <td>{{$k->judul}}</td>
        <td>
          <a href="/buku-restore/{{$k->slug}}">Restore</a>
          <a href="/fix-deleted-buku/{{$k->slug}}">Permanent Delete</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection
