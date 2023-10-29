@extends('layout.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/plugins/tempusdominus-bootstrap-4/tempusdominus-bootstrap-4.min.css') }}"
          rel="stylesheet"/>
@endpush

@section('content')
    @vite('resources/js/app.js')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Tables</a></li>
            <li class="breadcrumb-item active" aria-current="page">Basic Tables</li>
        </ol>
    </nav>

    <div class="row" id="preview-book-detail">
        <preview-book-detail></preview-book-detail>

        <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="successModalLabel">Sukses</h5>
                    </div>
                    <div class="modal-body">
                        Data peminjaman buku berhasil disimpan.
                    </div>
                    <div class="modal-footer">
                        <i>Silakan klik diluar kotak untuk menutup!</i>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="successModalLabel">Error!</h5>
                    </div>
                    <div class="modal-body">
                        Anda tidak diperbolehkan meminjam lebih dari 3 buku, lakukan pengembalian terlebih dahulu untuk melakukan peminjaman.
                    </div>
                    <div class="modal-footer">
                        <i>Silakan klik diluar kotak untuk menutup!</i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('plugin-scripts')
        <script src="{{ asset('assets/plugins/select2/select2.min.js') }}"></script>
    @endpush

    @push('custom-scripts')
        <script src="{{ asset('assets/js/select2.js') }}"></script>
    @endpush

@endsection
