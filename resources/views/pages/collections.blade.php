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
                                <th>Cover</th>
                                <th>Judul</th>
                                <th>Pengarang</th>
                                <th>Penerbit</th>
                                <th>Bukti Fisik ISBN</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($responseBody as $x)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <img src="{{asset('assets/images/' . $x->cover)}}" alt="">
                                    </td>
                                    <td>{{ $x->judul_utama }} {{ $x->judul_tambahan }}</td>
                                    <td>{{ $x->pengarang_utama }} {{ $x->pengarang_tambahan }}</td>
                                    <td>{{ $x->penerbit }}</td>
                                    <td>{{ $x->bukti_fisik_romawi }}, {{ $x->bukti_fisik_halaman }}, {{ $x->bukti_fisik_tebal }}</td>
                                    <td>
                                        @if(Auth::user()->role === 'user')
                                            <a href="{{ url('/collections') . '/' . $x->id }}">
                                                <button type="button" class="btn btn-primary btn-icon" hr>
                                                    <i data-feather="eye"></i>
                                                </button>
                                            </a>
                                        @endif

                                        @if(Auth::user()->role === 'admin')
                                            <a href="{{ url('/collections') . '/' . $x->id }}">
                                                <button type="button" class="btn btn-primary btn-icon" hr>
                                                    <i data-feather="eye"></i>
                                                </button>
                                            </a>
                                            <a href="{{ url('/update_collection') . '/' . $x->id }}">
                                                <button type="button" class="btn btn-warning btn-icon">
                                                    <i data-feather="edit"></i>
                                                </button>
                                            </a>
                                            <a href="##">
                                                <button type="button" class="btn btn-danger btn-icon">
                                                    <i data-feather="trash"></i>
                                                </button>
                                            </a>
                                        @endif
                                    </td>
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
