@extends('layout.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/prismjs/prism.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('daftar-peminjaman') }}">Peminjaman</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail Peminjaman</li>
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
                                <table class="table table-bordered w-auto">
                                    <tbody>
                                    <tr>
                                        <th>Judul Utama</th>
                                        <td>{{ $judul_utama }}</td>
                                        <th>Peminjam</th>
                                        <td>{{ $name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Judul Tambahan</th>
                                        <td>{{ $judul_tambahan }}</td>
                                        <th>Status</th>
                                        @if($status === 'DIPINJAM')
                                            @if(now() > $tanggal_harus_kembali)
                                                <td><span class="badge badge-danger">Terlambat, Belum Dikembalikan</span></td>
                                            @else
                                                <td><span class="badge badge-warning">Sedang Dipinjam</span></td>
                                            @endif
                                        @elseif($status === 'DIKEMBALIKAN')
                                            <td><span class="badge badge-success">Telah Dikembalikan</span></td>
                                        @endif
                                    </tr>
                                    <tr>
                                        <th>Pengarang</th>
                                        <td>{{ $pengarang_utama . " " . $pengarang_tambahan }}</td>
                                        <th>Tanggal Pinjam</th>
                                        <td>{{ date('d-m-Y H:i:s', strtotime($tanggal_pinjam)) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Penerbit</th>
                                        <td>{{ $penerbit }}</td>
                                        <th>Tanggal Harus Kembali</th>
                                        <td>{{ date('d-m-Y', strtotime($tanggal_harus_kembali)) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Kota Terbit</th>
                                        <td>{{ $kota_terbit }}</td>
                                        <th>Tanggal Kembali</th>
                                        <td>{{ $tanggal_kembali != null ? date('d-m-Y H:i:s', strtotime($tanggal_kembali)) : '' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tahun Terbit</th>
                                        <td>{{ $tahun_terbit }}</td>
                                        <th>Unit Kerja</th>
                                        <td>{{ $unit_kerja}}</td>
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
                            <br>
                            <a class="btn btn-warning" href="{{url('daftar-peminjaman')}}">Kembali</a>
                            <a class="btn btn-danger" data-toggle="modal" data-target="#confirmDeleteModal">Hapus</a>

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
                                            Apakah Anda yakin ingin menghapus data peminjaman a.n. {{ $name }}
                                        </div>
                                        <div class="modal-footer">
                                            <!-- Tambahkan tombol untuk mengonfirmasi penghapusan -->
                                            <a class="btn btn-danger" href="{{ route('delete.peminjaman', $peminjaman_id) }}">Ya, Hapus</a>
                                            <!-- Tombol untuk menutup modal -->
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                        </div>
                                    </div>
                                </div>
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
