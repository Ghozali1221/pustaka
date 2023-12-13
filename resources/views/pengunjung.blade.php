@extends('tampilan.main-menu')

@section('title', 'Data Pengunjung')

@section('konten')

Hello | Selamat Datang <b> {{Auth::user()->name}} </b>

<div class="mt-3">
    <h5 class="mb-3">History Peminjaman</h5>
    <x-history-table :dataHistory='$dataHistory' />
</div>
@endsection
