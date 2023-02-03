<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Apotek extends Model
{
    protected $table = 'apotek';
   
    protected $fillable = ['kode_obat', 'nama_obat', 'harga_beli', 'harga_jual', 'stock', 'satuan'];
}