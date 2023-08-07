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
                                        <td>Jacob</td>
                                    </tr>
                                    <tr>
                                        <th>Penerbit</th>
                                        <td>Larry</td>
                                    </tr>
                                    <tr>
                                        <th>Kota Terbit</th>
                                        <td>Larry</td>
                                    </tr>
                                    <tr>
                                        <th>Tahun Terbit</th>
                                        <td>Larry</td>
                                    </tr>
                                    <tr>
                                        <th>Tahun Terbit</th>
                                        <td>Larry</td>
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
