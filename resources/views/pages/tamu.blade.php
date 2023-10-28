@extends('layout.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/datatables-net/dataTables.bootstrap4.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Tamu</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Data Tamu</h6>
                    <p class="card-description">Data tamu pengunjung perpustakaan di BPK Perwakilan Provinsi Gorontalo</p>
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>No. HP</th>
                                <th>Asal Instansi</th>
                                <th>Waktu</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($responseBody as $x)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $x->name }}</td>
                                    <td>{{ $x->phone_no }}</td>
                                    <td>{{ $x->asal_instansi }}</td>
                                    <td>{{ date('d-m-Y H:i', strtotime($x->created_at)) }}</td>

                                    <th>
                                        <button type="button" class="btn btn-danger btn-icon" hr data-toggle="modal" data-target="#confirmDeleteModal">
                                            <i data-feather="trash"></i>
                                        </button>
                                    </th>

                                </tr>
                                <!-- Modal konfirmasi -->
                                <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="confirmDeleteModalLabel">Konfirmasi Hapus</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Apakah Anda yakin ingin menghapus data tamu a.n. {{ $x->name }}
                                            </div>
                                            <div class="modal-footer">
                                                <!-- Tambahkan tombol untuk mengonfirmasi penghapusan -->
                                                <a class="btn btn-danger" href="{{ route('delete.tamu', $x->id) }}">Ya, Hapus</a>
                                                <!-- Tombol untuk menutup modal -->
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('plugin-scripts')
    <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-net-bs4/dataTables.bootstrap4.js') }}"></script>
@endpush

@push('custom-scripts')
    <script src="{{ asset('assets/js/data-table.js') }}"></script>
@endpush
