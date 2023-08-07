<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    public $table = 'gorlib_buku';
    protected $guarded = '*';

    protected $primaryKey = 'id';
}
