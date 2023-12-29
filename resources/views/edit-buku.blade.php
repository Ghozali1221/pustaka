@extends('tampilan.main-menu')
@section('title', 'Edit Data Buku')
@section('konten')

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

Hello | <b> {{Auth::user()->name}} </b> Selamat Datang di Halaman Edit Buku

<h5 class="my-2">Edit Data Buku</h5>

@if ($errors->any())
<div class="alert alert-danger w-50">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="w-25">
    <form action="/buku-proses-edit/{{$dataBuku->slug}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="my-4">
            <label for="kode_buku" class="form-label">Kode Buku</label>
            <input type="text" id="kode_buku" name="kode_buku" class="form-control " value="{{ $dataBuku->kode_buku }}">
        </div>

        <div class="my-4">
            <label for="judul" class="form-label">Nama Buku</label>
            <input type="text" id="judul" name="judul" class="form-control " value="{{ $dataBuku->judul }}" autocomplete="off" autofocus>
        </div>

        <div>
            <label for="categori" class="form-label me-3 mb-2">Kategori</label>
            <select name="categories[]" id="categori" class="form-control select-multiple" multiple="multiple" aria-placeholder="pilih kategori">
                @foreach ( $dataKtgr as $ktgr )
                <option value="{{$ktgr->id}}">{{$ktgr->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="mt-2">
            <label for="dataK">Kategori Terpilih</label>
            <div>
                <ul>
                    @foreach ( $dataBuku->categories as $data)
                    <li>{{$data->name}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="my-4">
            <label for="image" class="form-label">Gambar</label>
            @if($dataBuku->cover )
            <img src="{{asset('storage/upload/'. $dataBuku->cover) }}" width="100px" height="50px" class="preview-gbr mt-2 mb-2 d-block">
            @else
            <img src="{{asset('images/book.jpg')}}" class="preview-gbr img-fluid col-sm-5 mb-1 d-block mb-2">
            @endif
            <input type="file" id="image" name="image" class="form-control" onchange="previewImage()">
            <p class="badge bg-primary text-start mt-2 d-block">Ukuran max : 2 MB <br>Ekstensi : jpg dan png</p>
        </div>

        <div class="mt-4 justify-content">
            <button type="submit" class="btn btn-info me-4">Simpan</button>
            <a href="/buku" class="btn btn-outline-info ">Kembali</a>
        </div>

    </form>
</div>


<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    // In your Javascript (external .js resource or <script> tag)
    $(document).ready(function() {
        $('.select-multiple').select2();
    });
</script>

<script>
    function previewImage() {
        const gbr = document.querySelector('#image');
        const PreviewGbr = document.querySelector('.preview-gbr');

        PreviewGbr.style.display = 'block';

        //   ambil data Gambar
        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);
        oFReader.onload = function(oFRevent) {
            PreviewGbr.src = oFRevent.target.result;
        }
    }
</script>

@endsection
