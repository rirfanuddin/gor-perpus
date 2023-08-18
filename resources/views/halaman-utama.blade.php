@extends('layout.master-halaman-utama')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/datatables-net/dataTables.bootstrap4.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Daftar Koleksi Buku</h6>
                    <p class="card-description">Daftar Koleksi Buku BPK Perwakilan Provinsi Gorontalo</p>
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
                                        <a href="/collections/{{$x->id}}">
                                            <button type="button" class="btn btn-primary btn-icon" hr>
                                                <i data-feather="eye"></i>
                                            </button>
                                        </a>
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
