@extends('layout.master-halaman-utama')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/datatables-net/dataTables.bootstrap4.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/owl-carousel/assets/owl.carousel.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/owl-carousel/assets/owl.theme.default.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-md-center">
            <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="owl-carousel owl-theme owl-animate-css">
                            <div class="item">
                                <img src="{{asset('assets/images/banner/kantor-bpk-gorontalo.jpeg')}}" alt="item-image">
                            </div>
                            <div class="item">
                                <img src="{{ url('https://via.placeholder.com/453x283') }}" alt="item-image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 grid-margin">
                <div class="card-group">
                    <div class="card">
                        <img src="{{asset('assets/images/' . $responseBody[0]->cover)}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $responseBody[0]->judul_utama }} {{ $responseBody[0]->judul_tambahan }}</h5>
                            <p class="card-text"><small class="text-muted">Telah dipinjam sebanyak 5 kali.</small></p>
                        </div>
                    </div>
                    <div class="card">
                        <img src="{{asset('assets/images/' . $responseBody[1]->cover)}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $responseBody[1]->judul_utama }} {{ $responseBody[1]->judul_tambahan }}</h5>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                    <div class="card">
                        <img src="{{asset('assets/images/' . $responseBody[2]->cover)}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $responseBody[2]->judul_utama }} {{ $responseBody[2]->judul_tambahan }}</h5>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-2 grid-margin stretch-card">
                <div class="card px-4 py-4">
                    <img src="{{asset('assets/images/main-page/book.png')}}" class="card-img-top" alt="...">
                    <div class="card-body text-center">
                        <h5 class="card-title">BOOK</h5>
                    </div>
                </div>
            </div>

            <div class="col-md-2 grid-margin stretch-card">
                <div class="card px-4 py-4">
                    <img src="{{asset('assets/images/main-page/audio-book.png')}}" class="card-img-top" alt="...">
                    <div class="card-body text-center">
                        <h5 class="card-title">AUDIO BOOK</h5>
                    </div>
                </div>
            </div>

            <div class="col-md-2 grid-margin stretch-card">
                <div class="card px-4 py-4">
                    <img src="{{asset('assets/images/main-page/journal.png')}}" class="card-img-top" alt="...">
                    <div class="card-body text-center">
                        <h5 class="card-title">JOURNAL</h5>
                    </div>
                </div>
            </div>

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
                                            <a href="{{url('/collections/' . $x->id)}}">
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

            <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Grouped bar chart</h6>
                        <canvas id="chartjsGroupedBar"></canvas>
                    </div>
                </div>
            </div>

        </div>
    </div>



    {{--  modal form input tamu  --}}
    <div class="modal fade" id="varyingModal" tabindex="-1" role="dialog" aria-labelledby="varyingModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="varyingModalLabel">Pengisian Buku Tamu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('storeTamuDB') }}" method="POST" id="formTamu">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name" class="col-form-label">Nama:</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="form-group">
                            <label for="phone_no" class="col-form-label">No. HP:</label>
                            <input type="text" class="form-control" id="phone_no" name="phone_no">
                        </div>
                        <div class="form-group">
                            <label for="asal_instansi" class="col-form-label">Asal Instansi:</label>
                            <input type="text" class="form-control" id="asal_instansi" name="asal_instansi">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="inputDataTamu">Submit</button>
                </div>
            </div>
        </div>
    </div>

    {{--  modal success  --}}
    <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successModalLabel">Sukses</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Data tamu berhasil disimpan!
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const submitButton = document.getElementById('inputDataTamu');
            const guestForm = document.getElementById('formTamu');
            const successModal = document.getElementById('successModal');

            submitButton.addEventListener('click', function () {
                const formData = new FormData(guestForm);

                fetch(baseUrl + '/api/tamu', {
                    method: 'POST',
                    body: formData,
                    // headers: {
                    //     'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    // }
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.message) {
                            $('#varyingModal').modal('hide');
                            $('#successModal').modal('show');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            });
        });

    </script>
@endsection

@push('plugin-scripts')
    <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-net-bs4/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('assets/plugins/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/chartjs/Chart.min.js') }}"></script>
@endpush

@push('custom-scripts')
    <script src="{{ asset('assets/js/data-table.js') }}"></script>
    <script src="{{ asset('assets/js/carousel.js') }}"></script>
    <script src="{{ asset('assets/js/chartjs.js') }}"></script>
@endpush
