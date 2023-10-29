@extends('layout.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/prismjs/prism.css') }}" rel="stylesheet" />
@endpush

@section('content')
    @if($showModalError)
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ \Illuminate\Support\Facades\Auth::user()->name }}</strong> Anda tidak diperbolehkan meminjam lebih dari 3 buku, lakukan pengembalian terlebih dahulu untuk melakukan peminjaman.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('collections') }}">Koleksi</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail Buku</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h2>{{ $judul_utama }} {{ $judul_tambahan }}</h2>
                    @if($count)
                        <h5 class="tersisa">Tersisa {{$count}} </h5>
                    @endif
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
                            <a class="btn btn-warning" href="{{url('collections')}}">Kembali</a>
                            @if(\Illuminate\Support\Facades\Auth::user()->role === 'user')
                                <a class="btn btn-primary" data-toggle="modal" data-target="#confirmKembalikan">Pinjam</a>
                                <!-- Modal konfirmasi Pengembalian-->
                                <div class="modal fade" id="confirmKembalikan" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="confirmDeleteModalLabel">Konfirmasi Peminjaman</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                @if($count > 0)
                                                    Apakah Anda yakin ingin meminjam buku dengan judul:  {{ $judul_utama . " " . $judul_tambahan }}
                                                @else
                                                    Buku telah dipinjam semua.
                                                @endif

                                            </div>
                                            <div class="modal-footer">
                                                @if($count > 0)
                                                    <!-- Tambahkan tombol untuk mengonfirmasi peminjaman -->
                                                    <a class="btn btn-primary" href="{{ url('/peminjaman_buku_langsung?user_id=' . \Illuminate\Support\Facades\Auth::user()->id . '&book_id=' . $id) }}">Ya, Pinjam</a>
                                                @endif
                                                <!-- Tombol untuk menutup modal -->
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
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
