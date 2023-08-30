<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeminjamanBuku extends Model
{
    public $table = 'peminjaman_buku';
    protected $primaryKey = 'id';
    protected $guarded = [''];
}
