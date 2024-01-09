@extends('tampilan.main-menu')

@section('title', 'History User')

@section('konten')


<h5>LOG HISTORY PEMINJAMAN</h5>
<div class="mt-3 p-4">
    <x-history-table :dataHistory='$dataHistory' />
</div>

{{$dataHistory}}

@endsection
