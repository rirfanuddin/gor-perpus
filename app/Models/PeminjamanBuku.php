<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PeminjamanBuku extends Model
{
    public $table = 'peminjaman_buku';
    protected $primaryKey = 'id';
    protected $guarded = [''];

    public function book(): HasOne {
        return $this->hasOne(Books::class);
    }
}
