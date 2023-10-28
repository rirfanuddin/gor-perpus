@extends('layout.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/datatables-net/dataTables.bootstrap4.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Peminjaman</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Data Peminjaman Buku</h6>
                    <p class="card-description">Data peminjaman buku perpustakaan di BPK Perwakilan Provinsi Gorontalo</p>
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
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($responseBody as $x)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $x->name }}</td>
                                    <td>{{ $x->judul_utama . " " . $x->judul_tambahan}}</td>
                                    <td>{{ date('d-m-Y', strtotime($x->created_at)) }}</td>
                                    <td>{{ date('d-m-Y', strtotime($x->tanggal_harus_kembali)) }}</td>
                                    @if($x->tanggal_kembali)
                                        <td>{{ date('d-m-Y', strtotime($x->tanggal_kembali)) }}</td>
                                    @else
                                        <td>-</td>
                                    @endif

                                    @if($x->status === 'DIPINJAM')
                                        @if(now() > $x->tanggal_harus_kembali)
                                            <td><span class="badge badge-danger">Terlambat, Belum Dikembalikan</span></td>
                                        @else
                                            <td><span class="badge badge-warning">Sedang Dipinjam</span></td>
                                        @endif
                                    @elseif($x->status === 'DIKEMBALIKAN')
                                        <td><span class="badge badge-success">Telah Dikembalikan</span></td>
                                    @endif

                                    <td>
                                        @if(\Illuminate\Support\Facades\Auth::user()->role === 'user')
                                            <a href="{{ url('/peminjaman/' . $x->id) }}">
                                                <button type="button" class="btn btn-primary btn-icon" hr>
                                                    <i data-feather="eye"></i>
                                                </button>
                                            </a>
                                        @elseif(\Illuminate\Support\Facades\Auth::user()->role === 'admin')
                                            <a href="http://wa.me/{{$x->phone_no}}?text=Anda memiliki peminjaman buku {{ $x->judul_utama . ' ' . $x->judul_tambahan}} yang jatuh tempo pada tanggal {{ date('d-m-Y', strtotime($x->tanggal_harus_kembali)) }}" target="_blank">
                                                <button type="button" class="btn btn-success btn-icon">
                                                    <i data-feather="navigation"></i>
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
