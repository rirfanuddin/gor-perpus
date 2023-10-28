@extends('layout.master')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('collections')}}">Books</a></li>
            <li class="breadcrumb-item active" aria-current="page">Update Buku</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Tambah koleksi</h6>
                    <!-- <p class="card-description">Add class <code>.table-bordered</code></p> -->
                    <div class="table-responsive pt-3">

                        <form  action="{{ route('updateCollectionDB' , $id) }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleInputText1">Judul Utama</label>
                                <input type="text" class="form-control" id="exampleInputText1" value="{{$judul_utama}}" placeholder="Judul Utama" name="judul_utama">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputText1">Judul Tambahan</label>
                                <input type="text" class="form-control" id="exampleInputText1" value="{{$judul_tambahan}}" placeholder="Judul Tambahan" name="judul_tambahan">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputText1">Pengarang Utama</label>
                                <input type="text" class="form-control" id="exampleInputText1" value="{{$pengarang_utama}}" placeholder="Pengarang Utama" name="pengarang_utama">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputText1">Pengarang Tambahan</label>
                                <input type="text" class="form-control" id="exampleInputText1" value="{{$pengarang_tambahan}}" placeholder="Pengarang Tambahan" name="pengarang_tambahan">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputText1">Penerbit</label>
                                <input type="text" class="form-control" id="exampleInputText1" value="{{$penerbit}}" placeholder="Penerbit" name="penerbit">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputText1">Kota Terbit</label>
                                <input type="text" class="form-control" id="exampleInputText1" value="{{$kota_terbit}}" placeholder="Kota Terbit" name="kota_terbit">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputText1">Tahun Terbit</label>
                                <input type="text" class="form-control" id="exampleInputText1" value="{{$tahun_terbit}}" placeholder="Tahun Terbit" name="tahun_terbit">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputText1">Bukti Fisik (Jumlah Halaman Romawi)</label>
                                <input type="text" class="form-control" id="exampleInputText1" value="{{$bukti_fisik_romawi}}" placeholder="Jumlah Halaman Romawi" name="bukti_fisik_romawi">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputNumber1">Bukti Fisik (Jumlah Halaman)</label>
                                <input type="number" class="form-control" id="exampleInputNumber1" value="{{$bukti_fisik_halaman}}" placeholder="Jumlah Halaman" name="bukti_fisik_halaman">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputNumber1">Bukti Fisik (Tebal Buku)</label>
                                <input type="number" class="form-control" id="exampleInputNumber1" value="{{$bukti_fisik_tebal}}" placeholder="Tebal Buku" name="bukti_fisik_tebal">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputText1">ISBN</label>
                                <input type="text" class="form-control" id="exampleInputText1" value="{{$isbn}}" placeholder="ISBN" name="isbn">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputText1">Bahasa</label>
                                <input type="text" class="form-control" id="exampleInputText1" value="{{$bahasa}}" placeholder="Bahasa" name="bahasa">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputText1">Subyek</label>
                                <input type="text" class="form-control" id="exampleInputText1" value="{{$subyek}}" placeholder="Subyek" name="subyek">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Jenis Koleksi</label>
                                <select class="form-control" id="exampleFormControlSelect1">
                                    <option selected>Textbook</option>
                                    <option>Coming Soon...</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Cover</label>
                                <input type="file" name="img[]" class="file-upload-default">
                                <div class="input-group col-xs-12">
                                    <input type="file" class="form-control file-upload-info" placeholder="Browse File" onchange="previewImage(event)" name="cover">

                                </div>
                                <br><br>
                                <img id="preview" src="{{asset('assets/images/' . $cover)}}" alt="Preview" style="width:50px; height:75px;">
                                <br>
                            </div>

                            <button class="btn btn-primary" type="submit">Submit</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function(){
                var preview = document.getElementById('preview');
                preview.src = reader.result;
                preview.style.display = "block";
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>

@endsection
