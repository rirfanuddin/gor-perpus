@extends('layout.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/datatables-net/dataTables.bootstrap4.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Tables</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Table</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Data Table</h6>
                    <p class="card-description">Read the <a href="https://datatables.net/" target="_blank"> Official DataTables Documentation </a>for a full list of instructions and other options.</p>
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Peminjam</th>
                                <th>Judul Buku</th>
                                <th>Tanggal Pinjam</th>
                                <th>Tanggal Harus Kembali</th>
                                <th>Tanggal Kembali</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td>Firman Ibrahim</td>
                                <td>Pemeriksaan Kinerja</td>
                                <td>13:15 17/08/2023</td>
                                <td>13:15 17/09/2023</td>
                                <td>-</td>
                                <td><span class="badge badge-warning">Belum Dikembalikan</span></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Arto Gafar</td>
                                <td>Pemeliharaan KDO</td>
                                <td>13:15 16/08/2023</td>
                                <td>13:15 16/09/2023</td>
                                <td>10:17 19/08/2023</td>
                                <td><span class="badge badge-success">Dikembalikan</span></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Firman Ibrahim</td>
                                <td>Pemeriksaan Kinerja</td>
                                <td>13:15 17/08/2023</td>
                                <td>13:15 17/09/2023</td>
                                <td>-</td>
                                <td><span class="badge badge-danger">Terlambat</span></td>
                            </tr>
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
