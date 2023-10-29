<script setup></script>

<template>
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Pilih Buku</h4>
                <p class="card-description">Silakan pilih buku dengan mengetikkan judul buku.</p>
                <form @submit.prevent="submitPeminjaman">
                    <div class="form-group">
                        <label>Cari Judul Buku</label>
                        <select class="w-100" v-model="selectedBookId" @change="fetchBookDetails">
                            <option value="">Pilih Judul Buku</option>
                            <option v-for="book in books" :key="book.id" :value="book.id">{{ book.judul_utama + " " + book.judul_tambahan }}</option>
                        </select>
                    </div>

                    <!-- disini -->

                    <button class="btn btn-primary" type="submit" v-if="bookDetails && bookCount > 0">Pinjam</button>
                </form>
            </div>

        </div>
    </div>
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body" v-if="!bookDetails">
                <h2>Preview Book</h2>
                <hr>
            </div>

            <div class="card-body" v-if="bookDetails">
                <h2>{{ bookDetails.judul_utama + " " + bookDetails.judul_tambahan}}</h2>
                <h5 class="tersisa" v-if="bookCount > 0">Tersisa {{bookCount}} </h5>
                <h5 class="tersisa" v-if="bookCount == 0">Buku telah dipinjam semua</h5>
                <hr>
                <div class="media d-block d-sm-flex">
                    <img v-bind:src="'/assets/images/' + bookDetails.cover" class="wd-100p wd-sm-200 mb-3 mb-sm-0 mr-3" alt="...">
                    <div class="media-body">
                        <div class="table-responsive">
                            <table class="table table-borderless w-auto">
                                <tbody>
                                <tr>
                                    <th>Judul Utama</th>
                                    <td>{{ bookDetails.judul_utama }}</td>
                                </tr>
                                <tr>
                                    <th>Judul Tambahan</th>
                                    <td>{{ bookDetails.judul_tambahan }}</td>
                                </tr>
                                <tr>
                                    <th>Pengarang</th>
                                    <td>{{ bookDetails.pengarang_utama + " " + bookDetails.pengarang_tambahan }}</td>
                                </tr>
                                <tr>
                                    <th>Penerbit</th>
                                    <td>{{ bookDetails.penerbit }}</td>
                                </tr>
                                <tr>
                                    <th>Kota Terbit</th>
                                    <td>{{ bookDetails.kota_terbit }}</td>
                                </tr>
                                <tr>
                                    <th>Tahun Terbit</th>
                                    <td>{{ bookDetails.tahun_terbit }}</td>
                                </tr>
                                <tr>
                                    <th>Bukti Fisik Romawi</th>
                                    <td>{{ bookDetails.bukti_fisik_romawi }}</td>
                                </tr>
                                <tr>
                                    <th>Bukti Fisik Halaman</th>
                                    <td>{{ bookDetails.bukti_fisik_halaman }}</td>
                                </tr>
                                <tr>
                                    <th>Bukti Fisik Tebal</th>
                                    <td>{{ bookDetails.bukti_fisik_tebal }}</td>
                                </tr>
                                <tr>
                                    <th>ISBN</th>
                                    <td>{{ bookDetails.isbn }}</td>
                                </tr>
                                <tr>
                                    <th>Subyek</th>
                                    <td>{{ bookDetails.subyek }}</td>
                                </tr>
                                <tr>
                                    <th>Jenis Koleksi</th>
                                    <td>{{ bookDetails.jenis_koleksi }}</td>
                                </tr>
                                <tr>
                                    <th>Bahasa</th>
                                    <td>{{ bookDetails.bahasa }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <hr>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            selectedBookId: null,
            books: [],
            bookDetails: null,
            userId: null,
            bookCount: null,
        }
    },
    methods: {
        async fetchBooks() {
            try {
                const response = await fetch( baseUrl + '/api/books');
                const data = await response.json();
                this.books = data;
            } catch (error) {
                console.error(error);
            }
        },
        async fetchBookDetails() {
            if (this.selectedBookId) {
                try {
                    console.log('selectedBookId : ' + this.selectedBookId);
                    const response = await fetch(baseUrl + `/api/book/${this.selectedBookId}`);
                    const responseBookCount = await fetch(baseUrl + `/api/book_count/${this.selectedBookId}`);
                    const data = await response.json();
                    const dataCount = await responseBookCount.json();
                    this.bookDetails = data;
                    this.bookCount = dataCount;
                } catch (error) {
                    console.error(error);
                }
            } else {
                this.bookDetails = null;
            }
        },
        async getUserId() {
            try {
                const response = await axios.get(baseUrl + '/api/get-user-id'); // Replace with your route
                this.userId = response.data.user_id;
            } catch (error) {
                console.error(error);
            }
        },
        async submitPeminjaman() {
            console.log('masuk function submitPeminjaman');
            try {
                if(this.selectedBookId) {
                    const response = await axios.post(baseUrl + '/api/peminjaman_buku', {
                        user_id: this.userId,
                        book_id: this.selectedBookId,
                    });

                    if(response.data.status === 'Failed, more than 3') {
                        $('#errorModal').modal('show');
                    } else if(response.data.status === 'Success') {
                        $('#successModal').modal('show');
                    }

                }
            } catch (error) {
                console.error(error);
            }
        }
    },
    mounted() {
        this.fetchBooks();
        this.getUserId();
    },
}
</script>
