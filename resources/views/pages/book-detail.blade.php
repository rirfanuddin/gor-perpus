@extends('layout.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/prismjs/prism.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/collections">Pencarian</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $judul_utama }} {{ $judul_tambahan }}</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h2>{{ $judul_utama }} {{ $judul_tambahan }}</h2>
                    <hr>
                    <div class="media d-block d-sm-flex">
                        <img src="{{ asset('assets/images/'. $cover) }}" class="wd-100p wd-sm-200 mb-3 mb-sm-0 mr-3" alt="...">
                        <div class="media-body">
                            <div class="table-responsive">
                                <table class="table table-borderless w-auto">
                                    <tbody>
                                    <tr>
                                        <th>Judul Utama</th>
                                        <td>{{ $judul_utama }}</td>
                                    </tr>
                                    <tr>
                                        <th>Judul Tambahan</th>
                                        <td>{{ $judul_tambahan }}</td>
                                    </tr>
                                    <tr>
                                        <th>Pengarang</th>
                                        <td>{{ $pengarang_utama . " " . $pengarang_tambahan }}</td>
                                    </tr>
                                    <tr>
                                        <th>Penerbit</th>
                                        <td>{{ $penerbit }}</td>
                                    </tr>
                                    <tr>
                                        <th>Kota Terbit</th>
                                        <td>{{ $kota_terbit }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tahun Terbit</th>
                                        <td>{{ $tahun_terbit }}</td>
                                    </tr>
                                    <tr>
                                        <th>Bukti Fisik Romawi</th>
                                        <td>{{ $bukti_fisik_romawi }}</td>
                                    </tr>
                                    <tr>
                                        <th>Bukti Fisik Halaman</th>
                                        <td>{{ $bukti_fisik_halaman }}</td>
                                    </tr>
                                    <tr>
                                        <th>Bukti Fisik Tebal</th>
                                        <td>{{ $bukti_fisik_tebal }}</td>
                                    </tr>
                                    <tr>
                                        <th>ISBN</th>
                                        <td>{{ $isbn }}</td>
                                    </tr>
                                    <tr>
                                        <th>Subyek</th>
                                        <td>{{ $subyek }}</td>
                                    </tr>
                                    <tr>
                                        <th>Jenis Koleksi</th>
                                        <td>{{ $jenis_koleksi }}</td>
                                    </tr>
                                    <tr>
                                        <th>Bahasa</th>
                                        <td>{{ $bahasa }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>

{{--    --}}
@endsection

@push('plugin-scripts')
    <script src="{{ asset('assets/plugins/prismjs/prism.js') }}"></script>
    <script src="{{ asset('assets/plugins/clipboard/clipboard.min.js') }}"></script>
@endpush
