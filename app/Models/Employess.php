<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employess extends Model
{
    use HasFactory;

    //ini adalah sebuah class menambahkan data ke dalam database
    protected $guarded = [];

    //ini adalah tanggal dari data pegawai
    protected $dates = ['created_at']; 
}
