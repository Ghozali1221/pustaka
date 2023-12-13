@extends('tampilan.main-menu')

@section('title', 'Deleted Data')

@section('konten')

Hello | <b> {{Auth::user()->name}} </b> Selamat Datang di Halaman Restore Data Kategori

<div>
<a href="/kategori" class="btn btn-outline-primary mt-4">kembali</a>
</div>

<div class="my-4">
  <table class="table table-bordered text-center">
    <thead>
      <tr>
        <th>No</th>
        <th>Kategori</th>
        <th>Opsi</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($data as $k)
      <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$k->name}}</td>
        <td>
          <a href="restore-data/{{$k->slug}}">Restore</a>
          <a href="fix-deleted-kategori/{{$k->slug}}">Permanent Delete</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection
