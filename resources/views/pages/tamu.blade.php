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
                                    <td>{{ date('d-m-Y', strtotime($x->created_at)) }}</td>

                                    <th>
                                        <a href="/peminjaman/{{$x->id}}">
                                            <button type="button" class="btn btn-primary btn-icon" hr>
                                                <i data-feather="eye"></i>
                                            </button>
                                        </a>
                                        <a href="/update_collection/{{$x->id}}">
                                            <button type="button" class="btn btn-warning btn-icon">
                                                <i data-feather="edit"></i>
                                            </button>
                                        </a>
                                    </th>

                                </tr>
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
