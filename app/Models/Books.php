<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    public $table = 'gorlib_buku';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $guarded = [''];
    protected $keyType = 'string';
}
