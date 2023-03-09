@extends('layout.master')

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Tables</a></li>
    <li class="breadcrumb-item active" aria-current="page">Basic Tables</li>
  </ol>
</nav>

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Koleksi Perpustakaan BPK Perwakilan Provinsi Gorontalo</h6>
        <!-- <p class="card-description">Add class <code>.table-bordered</code></p> -->
        <div class="table-responsive pt-3">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>
                  No.
                </th>
                <th>
                  Cover
                </th>
                <th>
                  Judul
                </th>
                <th>
                  Pengarang
                </th>
                <th>
                  Penerbit
                </th>
                <th>
                  Bukti Fisik
                </th>
                <th>
                  ISBN
                </th>
              </tr>
            </thead>
            <tbody>
            @foreach($responseBody as $x)
              <tr>
                <td>
                    {{ $loop->iteration }}
                </td>
                <td>
                  <img src="{{ asset('assets/images/' . $x->cover) }}" alt="">
                </td>
                <td>
                    {{$x->judul_utama}} {{ $x->judul_tambahan }}
                </td>
                <td>
                  {{$x->pengarang_utama}} {{$x->pengarang_tambahan}}
                </td>
                <td>
                  {{$x->penerbit}}
                </td>
                <td>
                  {{$x->bukti_fisik_romawi}}, {{$x->bukti_fisik_halaman}}, {{$x->bukti_fisik_tebal}}
                </td>
                <td>
                  {{$x->isbn}}
                </td>
            @endforeach
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
